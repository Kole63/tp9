<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SupplierController;

Route::get('/', [ ItemController::class, 'index' ])->name('home');

Route::resource('items', ItemController::class)->withTrashed();
Route::delete('items/{item}/forcedelete', [ ItemController::class, 'forcedestroy' ])->withTrashed()->name('items.forcedestroy');
Route::post('items/content', [ ItemController::class, 'content' ])->name('items.content');
Route::get('items/{item}/restore', [ ItemController::class, 'restore' ])->withTrashed()->name('items.restore');
Route::get('suppliers/{supplier}/items', [SupplierController::class, 'items'])->name('supplier.items');
Route::get('suppliers/{supplier}/deleteditems', [SupplierController::class, 'deleteditems'])->name('supplier.deleteditems');
Route::resource('suppliers', SupplierController::class);

Route::fallback(function () {
    return view('error');
  });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(EditorController::class)->group(function () {
    Route::get('suppliers/{supplier}/editors', 'index')->name('suppliers.editors');
    Route::delete('suppliers/{supplier}/editors/{user}', 'destroy')->name('suppliers.editors.destroy');
    Route::get('suppliers/{supplier}/editors/select', 'select')->name('suppliers.editors.select');
    Route::post('suppliers/{supplier}/editors', 'update')->name('suppliers.editors.update');
});

require __DIR__.'/auth.php';
