<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\UserController; //controller untuk admin crud user
use App\Http\Controllers\Admin\DepartementController; //controller untuk admin crud departement
use App\Http\Controllers\Admin\CompanyController; //controller untuk admin crud company
use App\Http\Controllers\Admin\RoleController; //controller untuk admin crud role
use App\Http\Controllers\Admin\PermissionController; //controller untuk admin crud role
use App\Http\Controllers\Admin\PeriodController; //controller untuk admin crud periode

use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Internal\DashboardDeptVIController; //controller untuk dept VI
use App\Http\Controllers\Internal\IndicatorController; //controller untuk dept VI

use App\Http\Controllers\Internal\DashboardDeptVEController; //controller untuk dept VE

use App\Http\Controllers\Departement\viitemController;
use App\Http\Controllers\Departement\veitemController;

use App\Http\Controllers\EventController;
use App\Http\Controllers\corporate\VirevController; //controller untuk admin crud
use App\Http\Controllers\corporate\VerevController;

use App\Http\Controllers\corporate\CorporateveController;
use App\Http\Controllers\corporate\CorpVIController;
use App\Http\Controllers\corporate\ProfitController;
use App\Http\Controllers\corporate\ProvitveController;
use App\Http\Controllers\corporate\AgingController;
use App\Http\Controllers\corporate\PhyisicalAvailabilityController;
use App\Http\Controllers\Visitor\VisitorController;


use App\Http\Controllers\Realization\RealizationpdcaController;

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

// Route::get('/', function () {
//     return view('auth.login');
// })->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','role:admin'])->group(function () {

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

Route::middleware(['auth'])->group(function () {
    // Route::get('/revenueVI/tipe-pekerjaan', [DashboardUserController::class, 'jobchartVI']);
    //dashboard departement vi
    Route::get('/deptVI', [DashboardDeptVIController::class, 'index'])->name('deptVI');
    //dashboard departement ve
    Route::get('/deptVE', [DashboardDeptVEController::class, 'index'])->name('deptVE');
    //dashboard corporate vi
    Route::get('/CorVE', [CorporateveController::class, 'index'])->name('CorVE')->middleware('trackvisitor');
    //dashboard corporate ve
    Route::get('/CorpVI', [CorpVIController::class, 'index'])->name('CorpVI');

    // Route::get('/track-visitor', [VisitorController::class, 'trackVisitor']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
