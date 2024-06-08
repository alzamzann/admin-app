<?php

use App\Models\Katalog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
// use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('home');
});

Route::get('/admin', function () {
    $jumlahBarang = Katalog::count();
    $jumlahHardware = Katalog::where('jenis', 'Hardware')->count();
    $jumlahSoftware = Katalog::where('jenis', 'Software')->count();

    return view('admindash', compact('jumlahBarang', 'jumlahHardware','jumlahSoftware'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog');

Route::get('/addBarang', [KatalogController::class, 'addBarang'])->name('addBarang');

Route::post('/insertBarang', [KatalogController::class, 'insertBarang'])->name('insertBarang');

Route::get('/tampilDataBarang/{id}', [KatalogController::class, 'tampilDataBarang'])->name('tampilDataBarang');

Route::post('/updateDataBarang/{id}', [KatalogController::class, 'updateDataBarang'])->name('updateDataBarang');

Route::get('/deleteDataBarang/{id}', [KatalogController::class, 'deleteDataBarang'])->name('deleteDataBarang');

Route::get('/exportPDF', [KatalogController::class, 'exportPDF'])->name('exportPDF');

Route::get('/exportExcel', [KatalogController::class, 'exportExcel'])->name('exportExcel');

Route::post('/importExcel', [KatalogController::class, 'importExcel'])->name('importExcel');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/ecom', function () {
    $ecomHardware = Katalog::where('jenis', 'hardware')->get();
    $ecomSoftware = Katalog::where('jenis', 'software')->get();

    return view('ecom', compact('ecomHardware','ecomSoftware'));
})->name('ecom');

Route::get('/home', function () {
    return view('home');
});

Route::get('/lighter-tech', function () {
    return view('lighter_tech');
})->name('lighter.tech');

Route::get('/lighter-multimedia', function () {
    return view('lighter_multimedia');
})->name('lighter.multimedia');

Route::get('/lgtr-digimar', function () {
    return view('lgtr_digimar');
})->name('lgtr.digimar');

Route::get('/eikyo-management', function () {
    return view('eikyo_management');
})->name('eikyo.management');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
