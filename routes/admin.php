<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CompanyController; //controller untuk admin crud company
use App\Http\Controllers\Admin\PeriodController; //controller untuk admin crud periode
use App\Http\Controllers\Admin\DepartementController; //controller untuk admin crud departement
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\UserController; //controller untuk admin crud user
use App\Http\Controllers\Admin\RoleController; //controller untuk admin crud role
use App\Http\Controllers\Admin\PermissionController; //controller untuk admin crud role
use App\Http\Controllers\corporate\AgingController;
use App\Http\Controllers\corporate\ProfitController;
use App\Http\Controllers\corporate\ProvitveController;
use App\Http\Controllers\corporate\PhyisicalAvailabilityController;
use App\Http\Controllers\corporate\VirevController; //controller untuk admin crud
use App\Http\Controllers\corporate\VerevController;
use App\Http\Controllers\Departement\viitemController;
use App\Http\Controllers\Departement\veitemController;


Route::middleware(['auth'])->group(function () {

    //universal admin
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin');
    Route::resource('/companies', CompanyController::class);
    Route::resource('/periods', PeriodController::class);
    Route::resource('/events', EventController::class);
    Route::resource('/departements', DepartementController::class);
    Route::resource('/users', UserController::class);
    // Route::put('users/{id}', UserController::class, 'update')->name('users.update');

    Route::post('/users/{user}/role', [UserController::class, 'assignRole'])->name('user.role');
    Route::delete('/users/{user}/role/{role}', [UserController::class, 'removeRole'])->name('user.roles.remove');
    Route::post('/users/{user}/permission', [UserController::class, 'givePermission'])->name('user.permission');
    Route::delete('/users/{user}/permission/{permission}', [UserController::class, 'removePermission'])->name('user.permission.revoke');

    Route::resource('/role', RoleController::class);
    Route::post('/role/{role}/permission', [RoleController::class, 'givePermission'])->name('role.permission');
    Route::delete('/role/{role}/permission/{permission}', [RoleController::class, 'revokePermission'])->name('role.permission.revoke');

    Route::resource('/permission', PermissionController::class);
    Route::post('/permission/{permission}/role', [PermissionController::class, 'assignRole'])->name('role.permission.role');
    Route::delete('/permission/{permission}/role/{role}', [PermissionController::class, 'removeRole'])->name('permission.roles.remove');
    
    //corporate universal
    Route::resource('/agings', AgingController::class);
    Route::resource('/profits', ProfitController::class);
    Route::resource('/veprofits', ProvitveController::class);
    Route::resource('/physicalavailability', PhyisicalAvailabilityController::class);

    // corporate vi
    Route::resource('/virevs', VirevController::class);
    Route::post('/virevs/import', [VirevController::class, 'import'])->name('virevs.import');
    //corporate ve
    Route::resource('/verevs', VerevController::class);
    Route::post('/verevs/import', [VerevController::class, 'import'])->name('verevs.import');
    //departement vi
    Route::resource('/viitem', viitemController::class);
    Route::post('/viitem/import', [viitemController::class, 'import'])->name('viitem.import');
    //departement ve
    Route::resource('/veitem', veitemController::class);
    Route::post('/veitem/import', [veitemController::class, 'import'])->name('veitem.import');
});