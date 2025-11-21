<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\User;
use Yajra\DataTables\DataTables;

class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Supplier $supplier)
    {
        if($request->ajax()) {
            $list = $supplier->editors();
            return DataTables::of($list)
                ->addColumn('actions', function($row) use ($supplier) {
                    return view('editors.buttons', [ 'row' => $row, 'supplier' => $supplier, 'user' => Auth::user() ])->render();
                })
                ->filter(function ($query) {
                    $query->where(function (Builder $query) {
                        $query->where('name', 'like', "%" . request('search')['value'] . "%");
                    });
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        else
          return view('editors.list', ['supplier' => $supplier]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function select(Supplier $supplier)
    {
        if(Gate::denies('update', $supplier)) {
          return redirect()->route('suppliers.index')->with('error', "Vous n'avez pas le droit de modifier un fournisseur.");
        }
        return view('editors.select', [  'supplier' => $supplier, 'editorList' => User::orderBy('name', 'asc')->get() ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        if(Gate::denies('update', $supplier)) {
          return redirect()->route('suppliers.index')->with('error', "Vous n'avez pas le droit de modifier un fournisseur.");
        }
        
        $supplier->editors()->sync($request->input('editors'));
        
        // Mettre à jour les rôles éditeurs
        // On voit ici que le rôle éditeur n'était pas utile
        
        return redirect()->route('suppliers.editors', $supplier);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier, User $user) {
        if(Gate::denies('update', $supplier)) {
          return redirect()->route('suppliers.index')->with('error', "Vous n'avez pas le droit de supprimer un fournisseur.");
        }
        $supplier->editors()->detach($user);
        
        if($user->suppliers->count() == 0)
            $user->removeRole('editor');
        
        return redirect()->route('suppliers.editors', $supplier);
    }
}
