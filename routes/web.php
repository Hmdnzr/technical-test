<?php

use App\Http\Controllers\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FormElementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|  
*/

Route::get('/', [FormController::class, 'index']);
Route::get('/form/{form}',[FormController::class,'viewForm'])->name('view-form');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::resource('admin/products', Product::class)->except(['create', 'edit']);
    Route::get('dashboard/form/index', [Product::class, 'index'])->name('admin.products');
}); 

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth', 'verified']], function () {
    Route::resource('form', FormController::class);
    Route::get('form-delete/{form}', [FormController::class, 'delete'])->name('form.delete');
    Route::resource('form-element', FormElementController::class);
    Route::group(['prefix' => 'form-element/render', 'as' => 'form-element.render.'], function () {
        Route::get('option', [FormElementController::class,'renderOption'])->name('option');
        Route::get('generate-element',[FormElementController::class,'generateElement'])->name('generate-element');
        Route::get('delete/{form}', [FormElementController::class,'delete'])->name('delete');
    });
    Route::post('form-element/save/{form}', [FormElementController::class,'saveForm'])->name('form-element.save');
});


require __DIR__ . '/auth.php';

// Route::get('admin/dashboard', [HomeController::class,'index'])->middleware(['auth','admin']);