<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::prefix('/admin')->group(function () {

    // Admin login route
    Route::match(['get','post'],'login', [AdminController::class, 'Index'])->name('admin.login');

    // Admin dashboard route
    Route::get('dashboard', [DashboardController::class, 'Index'])->name('admin.dashboard');




    // Role routes
    Route::get('all-roles', [RoleController::class, 'Index']);
    Route::post('/add-role', [RoleController::class, 'Store']);
    Route::get('/edit-role/{id}', [RoleController::class, 'Edit']);
    Route::put('/update-role/{id}', [RoleController::class, 'UpdateRole']);
    Route::delete('/delete-role/{id}', [RoleController::class, 'Destroy']);




    // Permission routes
    Route::get('all-permissions', [PermissionController::class, 'Index']);
    Route::post('/add-permission', [PermissionController::class, 'Store']);
    Route::get('/edit-permission/{id}', [PermissionController::class, 'Edit']);
    Route::put('/update-permission/{id}', [PermissionController::class, 'UpdatePermission']);
    Route::delete('/delete-permission/{id}', [PermissionController::class, 'Destroy']);
});
