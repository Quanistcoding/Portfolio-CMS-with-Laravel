<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserProfileController;
use App\Http\Controllers\admin\AboutController;

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

Route::controller(UserProfileController::class)->middleware(['auth', 'verified'])->group(function(){
    Route::get('admin/profile/edit','edit')->name('admin.profile.edit');
    Route::post('admin/profile/edit/store','editStore')->name('admin.profile.edit.store');
    Route::get('admin/profile','profile')->name('admin.profile');
});

Route::controller(AboutController::class)->middleware(['auth', 'verified'])->group(function(){
    Route::get('admin/about','about')->name('admin.about');
    Route::post('admin/about/store','store')->name('admin.about.store');

});


Route::get('/', function () {
    return view('landing');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
