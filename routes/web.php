<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserProfileController;
use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\BlogController;

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


//Admin
Route::controller(UserProfileController::class)->middleware(['auth', 'verified'])->group(function(){
    Route::get('admin/profile/edit','edit')->name('admin.profile.edit');
    Route::post('admin/profile/edit/store','editStore')->name('admin.profile.edit.store');
    Route::get('admin/profile','profile')->name('admin.profile');
});

Route::controller(AboutController::class)->middleware(['auth', 'verified'])->group(function(){
    Route::get('admin/about','about')->name('admin.about');
    Route::post('admin/about/store','store')->name('admin.about.store');
    Route::get('admin/about/imageGroup','imageGroup')->name('admin.about.imageGroup');
    Route::get('admin/about/imageGroup/add','imageGroupAdd')->name('admin.about.imageGroup.add');
    Route::post('admin/about/imageGroup/add','imageGroupAddStore')->name('admin.about.imageGroup.add.store');
    Route::get('admin/about/imageGroup/edit/{id}','imageGroupEdit')->name('admin.about.imageGroup.edit');
    Route::post('admin/about/imageGroup/edit','imageGroupEditStore')->name('admin.about.imageGroup.edit.store');
    Route::get('admin/about/imageGroup/delete/{id}','imageGroupDelete')->name('admin.about.imageGroup.delete');
  });

Route::controller(AuthController::class)->middleware(['auth', 'verified'])->group(function(){
    Route::get('admin/changePassword','changePassword')->name('admin.changePassword');
    Route::post('admin/changePassword/store','changePasswordStore')->name('admin.changePassword.store');
});

Route::controller(PortfolioController::class)->middleware(['auth', 'verified'])->group(function(){
    Route::get('admin/portfolio','portfolio')->name('admin.portfolio');
    Route::get('admin/portfolio/add','portfolioAdd')->name('admin.portfolio.add');
    Route::post('admin/portfolio/add','portfolioAddStore')->name('admin.portfolio.add.store');  
    Route::get('admin/portfolio/edit/{id}','portfolioEdit')->name('admin.portfolio.edit');
    Route::post('admin/portfolio/edit','portfolioEditStore')->name('admin.portfolio.edit.store');
    Route::get('admin/portfolio/delete/{id}','portfolioDelete')->name('admin.portfolio.delete');
    Route::get('admin/portfolio/category','portfolioCategory')->name('admin.portfolio.category');
    Route::get('admin/portfolio/category/add','portfolioCategoryAdd')->name('admin.portfolio.category.add');
    Route::post('admin/portfolio/category/add','portfolioCategoryAddStore')->name('admin.portfolio.category.add.store');
    Route::get('admin/portfolio/category/edit/{id}','portfolioCategoryEdit')->name('admin.portfolio.category.edit');
    Route::post('admin/portfolio/category/edit','portfolioCategoryEditStore')->name('admin.portfolio.category.edit.store');
    Route::get('admin/portfolio/category/delete/{id}','portfolioCategoryDelete')->name('admin.portfolio.category.delete');
});

Route::controller(BlogController::class)->middleware(['auth', 'verified'])->group(function(){
    Route::get('admin/blog','blog')->name('admin.blog');
    Route::get('admin/blog/add','blogAdd')->name('admin.blog.add');
    Route::post('admin/blog/add','blogAddStore')->name('admin.blog.add.store');  
    Route::get('admin/blog/edit/{id}','blogEdit')->name('admin.blog.edit');
    Route::post('admin/blog/edit','blogEditStore')->name('admin.blog.edit.store');
    Route::get('admin/blog/delete/{id}','blogDelete')->name('admin.blog.delete');
    Route::get('admin/blog/category','blogCategory')->name('admin.blog.category');
    Route::get('admin/blog/category/add','blogCategoryAdd')->name('admin.blog.category.add');
    Route::post('admin/blog/category/add','blogCategoryAddStore')->name('admin.blog.category.add.store');
    Route::get('admin/blog/category/edit/{id}','blogCategoryEdit')->name('admin.blog.category.edit');
    Route::post('admin/blog/category/edit','blogCategoryEditStore')->name('admin.blog.category.edit.store');
    Route::get('admin/blog/category/delete/{id}','blogCategoryDelete')->name('admin.blog.category.delete');
});

//Client
Route::controller(ClientController::class)->group(function(){
    Route::get('client/about','aboutDetail')->name('client.about');
    Route::get('client/portfolio/{id}','portfolioDetail')->name('client.portfolio.detail');
});


Route::get('/', function () {
    return view('client.landing.index');
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
