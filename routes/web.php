<?php

use App\Models\Katalog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KatalogController;
// use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    $jumlahBarang = Katalog::count();

    return view('welcome', compact('jumlahBarang'));
});

Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog');

Route::get('/addBarang', [KatalogController::class, 'addBarang'])->name('addBarang');

Route::post('/insertBarang', [KatalogController::class, 'insertBarang'])->name('insertBarang');

Route::get('/tampilDataBarang/{id}', [KatalogController::class, 'tampilDataBarang'])->name('tampilDataBarang');

Route::post('/updateDataBarang/{id}', [KatalogController::class, 'updateDataBarang'])->name('updateDataBarang');

Route::get('/deleteDataBarang/{id}', [KatalogController::class, 'deleteDataBarang'])->name('deleteDataBarang');

Route::get('/exportPDF', [KatalogController::class, 'exportPDF'])->name('exportPDF');

Route::get('/exportExcel', [KatalogController::class, 'exportExcel'])->name('exportExcel');

Route::post('/importExcel', [KatalogController::class, 'importExcel'])->name('importExcel');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
