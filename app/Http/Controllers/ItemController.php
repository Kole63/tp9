<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use App\Models\Supplier;
use App\Http\Requests\ItemRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*if($request->ajax()) {
            $list = Item::query()->with('supplier')->with('categories');
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
            return view('items.list', [ 'ajaxURL' => route('items.index') ]);
        }*/

        $list = Item::query()->with('supplier')->with('categories')->orderBy('title', 'asc')->take(12)->get();
        return view('items.thumbnail_list', [ 'list' => $list ]);
    }
    
    public function content(Request $request)
    {
        if($request->has('offset')) {
            $list = Item::query()->with('supplier')->with('categories')->orderBy('title', 'asc')->offset(intval($request->offset))->limit(12);
            return view('items.thumbnail_content', [ 'list' => $list->get() ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {        
        if(Gate::denies('create', Item::class)) {
          return redirect()->route('home')->with('error', "Vous n'avez pas le droit de créer un article.");
        }
        
        if(Auth::user()->role('admin'))
            $supplierlst = Supplier::all();
        else
            $supplierlst = Auth::user()->suppliers;
        
        return view('items.create', [
            'supplierlst' => $supplierlst,
            'categorylst' => Category::orderBy('title', 'asc')->get(),
            'action' => route('items.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemRequest $request)
    {
        if(Gate::denies('create', Item::class)) {
          return redirect()->route('home')->with('error', "Vous n'avez pas le droit de créer un article.");
        }
        
        if(!Auth::user()->role('admin') && !Auth::user()->suppliers->contains($request->input('supplier_id')))
            return redirect()->back()->with('error', "Vous n'êtes pas un éditeur de ce fournisseur.")->withInput();
        
        $data = $request->validated();
        if($request->has('image')) {
            if($request->file('image')->isValid())
                $data['image'] = $request->file('image')->store('', 'items_images');
        }
        $item = Item::create($data);
        $item->categories()->attach($request->categories);
        
        return redirect()->route('items.show', ['item' => $item]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Item $item)
    {
        if($item->trashed() && Gate::denies('view', $item))
            return redirect()->route('home')->with('error', "Vous n'avez pas le droit d'accéder à cet article.");
        
        if($request->ajax()) {
            return [
                'title' => $item->title,
                'content' => view('items.ajax', [ 'item' => $item])->render()
            ];
        }
        return view('items.show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        if(Gate::denies('update', $item)) {
          return redirect()->route('home')->with('error', "Vous n'avez pas le droit de modifier cet article.");
        }
        
        if(Auth::user()->role('admin'))
            $supplierlst = Supplier::all();
        else
            $supplierlst = Auth::user()->suppliers;

        return view('items.edit', [
            'item' => $item,
            'supplierlst' => $supplierlst,
            'categorylst' => Category::orderBy('title', 'asc')->get(),
            'action' => route('items.update', $item->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemRequest $request, Item $item)
    {
        if(Gate::denies('update', $item)) {
          return redirect()->route('home')->with('error', "Vous n'avez pas le droit de modifier cet article.");
        }
        
        if(!Auth::user()->role('admin') && !Auth::user()->suppliers->contains($request->input('supplier_id')))
            return redirect()->back()->with('error', "Vous n'êtes pas un éditeur de ce fournisseur.")->withInput();
        
        $data = $request->validated();
        if($request->has('image')) {
            if($request->file('image')->isValid()) {
                if($item->image != null)
                    Storage::disk('items_images')->delete($event->image);
                $data["image"] = $request->file('image')->store('', 'items_images');
            }
        }
        $item->update($data);
        $item->categories()->sync($request->categories);

        return redirect()->route(
            'items.show', ['item' => $item]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        if(Gate::denies('delete', $item)) {
          return redirect()->route('home')->with('error', "Vous n'avez pas le droit de supprimer cet article.");
        }
        
        $item->delete();
        return redirect()->route('items.index');
    }

    /**
     * Remove definitively the specified resource from storage.
     */
    public function forcedestroy(Item $item)
    {
        if(Gate::denies('forcedelete', $item)) {
          return redirect()->route('home')->with('error', "Vous n'avez pas le droit de supprimer cet article.");
        }
        
        if($item->image != null)
            Storage::disk('items_images')->delete($item->image);
        $item->categories()->detach();
        $item->forceDelete();
        return redirect()->route('supplier.deleteditems', $item->supplier->id);
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(Item $item)
    {
        if(Gate::denies('restore', $item)) {
          return redirect()->route('home')->with('error', "Vous n'avez pas le droit de restaurer cet article.");
        }
        
        $item->restore();
        return redirect()->route('supplier.deleteditems', $item->supplier->id);
    }


}
