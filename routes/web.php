<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HubController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ParcelController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('parcel',ParcelController::class);
    Route::resource('hub',HubController::class);

    

});

Route::middleware(['auth', 'role:manager'])->group(function(){
    Route::get('/manager/dashboard', [ManagerController::class, 'dashboard'])->name('manager.dashboard');
});
Route::middleware(['auth', 'role:user'])->group(function(){
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
});

require __DIR__.'/auth.php';
