<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SupplierRequest;
use App\Models\Item;
use App\Models\Supplier;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTables;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $list = Supplier::query();
            return DataTables::of($list)
                ->addColumn('actions', function($row) {
                    return view('suppliers.buttons', [ 'row' => $row ])->render();
                })
                ->filter(function ($query) {
                    $query->where(function (Builder $query) {
                        $query->where('name', 'like', "%" . request('search')['value'] . "%")
                            ->orWhere('address', 'like', "%" . request('search')['value'] . "%");
                    });
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        else {
            return view('suppliers.list');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Gate::denies('create', Supplier::class)) {
          return redirect()->route('suppliers.index')->with('error', "Vous n'avez pas le droit de créer un fournisseur.");
        }
        
        return view('suppliers.create', [ 'action' => route('suppliers.store') ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupplierRequest $request)
    {
        if(Gate::denies('create', Supplier::class)) {
          return redirect()->route('suppliers.index')->with('error', "Vous n'avez pas le droit de créer un fournisseur.");
        }
        
        $request->validated();
        $supplier = Supplier::create($request->input());
        
        return redirect()->route('suppliers.show', ['supplier' => $supplier]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        return view('suppliers.show', ['supplier' => $supplier]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        if(Gate::denies('update', $supplier)) {
          return redirect()->route('suppliers.index')->with('error', "Vous n'avez pas le droit de modifier un fournisseur.");
        }
        
        return view('suppliers.edit', ['supplier' => $supplier, 'action' => route('suppliers.update', $supplier->id) ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupplierRequest $request, Supplier $supplier)
    {
        if(Gate::denies('update', $supplier)) {
          return redirect()->route('suppliers.index')->with('error', "Vous n'avez pas le droit de modifier un fournisseur.");
        }
        
        $request->validated();
        $supplier->update($request->input());
        
        return redirect()->route('suppliers.show', ['supplier' => $supplier]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        if(Gate::denies('delete', $supplier)) {
          return redirect()->route('home')->with('error', "Vous n'avez pas le droit de supprimer un fournisseur.");
        }
        
        foreach($supplier->items as $item) {
            $item->categories()->detach();
            $item->delete();
        }
        $supplier->editors()->detach();
        $supplier->delete();
        
        return redirect()->route('suppliers.index');
    }
    
    public function items(Request $request, Supplier $supplier)
    {
        if($request->ajax()) {
            $list = Item::query()->with('supplier')->with('categories')->where('supplier_id', $supplier->id);
            return DataTables::of($list)
                ->addColumn('item', function($row) {
                    return view('items.item', [ 'row' => $row ])->render();
                })
                ->addColumn('actions', function($row) {
                    return view('items.buttons', [ 'row' => $row ])->render();
                })
                ->filter(function ($query) {
                    $query->where(function (Builder $query) {
                        $query->where('title', 'like', "%" . request('search')['value'] . "%")
                            ->orWhere('description', 'like', "%" . request('search')['value'] . "%");
                    });
                })
                ->orderColumn('item', function($query, $order) {
                    $query->orderBy('title', $order);
                })
                ->rawColumns(['item', 'actions'])
                ->make(true);
        }
        else {
            return view('items.list', [ 'supplier' => $supplier, 'ajaxURL' => route('supplier.items', $supplier->id) ]);
        }
    }

    public function deleteditems(Request $request, Supplier $supplier)
    {
        if(Gate::denies('editItems', $supplier)) {
          return redirect()->route('suppliers.index')->with('error', "Vous n'avez pas le droit d'accéder à cette section.");
        }
        
        if($request->ajax()) {
            $list = Item::query()->with('supplier')->with('categories')->where('supplier_id', $supplier->id)->onlyTrashed();
            return DataTables::of($list)
                ->addColumn('item', function($row) {
                    return view('items.item', [ 'row' => $row ])->render();
                })
                ->addColumn('actions', function($row) {
                    return view('items.buttons', [ 'row' => $row ])->render();
                })
                ->filter(function ($query) {
                    $query->where(function (Builder $query) {
                        $query->where('title', 'like', "%" . request('search')['value'] . "%")
                            ->orWhere('description', 'like', "%" . request('search')['value'] . "%");
                    });
                })
                ->orderColumn('item', function($query, $order) {
                    $query->orderBy('title', $order);
                })
                ->rawColumns(['item', 'actions'])
                ->make(true);
        }
        else {
            return view('items.list', [
                'supplier' => $supplier,
                'ajaxURL' => route('supplier.deleteditems', $supplier->id)
            ]);
        }
    }
}
