<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\UserController; //controller untuk admin crud user
use App\Http\Controllers\Admin\DepartementController; //controller untuk admin crud departement
use App\Http\Controllers\Admin\CompanyController; //controller untuk admin crud company
use App\Http\Controllers\Admin\RoleController; //controller untuk admin crud role
use App\Http\Controllers\Admin\PermissionController; //controller untuk admin crud role
use App\Http\Controllers\Admin\PeriodController; //controller untuk admin crud periode
use App\Http\Controllers\Admin\RevenueVIController; //controller untuk admin crud revenue VI
use App\Http\Controllers\Admin\VerevenueController; //controller untuk admin crud revenue VE
use App\Http\Controllers\Admin\PAController; //controller untuk admin crud PA VI
use App\Http\Controllers\Admin\TypeJobController; //controller untuk admin crud type job VI|VE
use App\Http\Controllers\Admin\VirevController; //controller untuk admin crud
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Internal\DashboardUserController; //controller untuk dashboard VI
// use App\Http\Controllers\Internal\DashboardUserVEController; //controller untuk dashboard VE

use App\Http\Controllers\Internal\DashboardDeptVIController; //controller untuk dept VI
use App\Http\Controllers\Internal\DashboardDeptVEController; //controller untuk dept VE

use App\Http\Controllers\Departement\PDCAController;
use App\Http\Controllers\Departement\realizationController;
use App\Http\Controllers\Departement\ITController;
use App\Http\Controllers\Departement\viitemController;
use App\Http\Controllers\Departement\veitemController;

use App\Http\Controllers\EventController;
use App\Http\Controllers\corporate\VerevController;
use App\Http\Controllers\corporate\CorporateveController;
use App\Http\Controllers\corporate\CorpVIController;

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

    // Route::get('/Admin', DashboardController::class)->name('admin');
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin');


    Route::resource('/companies', CompanyController::class);
    Route::resource('/periods', PeriodController::class);
    Route::resource('/PA', PAController::class);
    Route::resource('/type_jobs', TypeJobController::class);
    Route::post('/revenue-import', [RevenueVIController::class, 'import']);
    Route::resource('/revenue', RevenueVIController::class);
    Route::resource('/revenue-ve', VerevenueController::class);

    Route::resource('/virevs', VirevController::class);

    Route::resource('/verevs', VerevController::class);
    Route::resource('/events', EventController::class);
    Route::resource('/agings', AgingController::class);
    Route::resource('/profits', ProfitController::class);

    Route::resource('/role', RoleController::class);
    Route::post('/role/{role}/permission', [RoleController::class, 'givePermission'])->name('role.permission');
    Route::delete('/role/{role}/permission/{permission}', [RoleController::class, 'revokePermission'])->name('role.permission.revoke');

    Route::resource('/permission', PermissionController::class);
    Route::post('/permission/{permission}/role', [PermissionController::class, 'assignRole'])->name('role.permission.role');
    Route::delete('/permission/{permission}/role/{role}', [PermissionController::class, 'removeRole'])->name('permission.roles.remove');

    Route::resource('/users', UserController::class);
    Route::post('/users/{user}/role', [UserController::class, 'assignRole'])->name('user.role');
    Route::delete('/users/{user}/role/{role}', [UserController::class, 'removeRole'])->name('user.roles.remove');
    Route::post('/users/{user}/permission', [UserController::class, 'givePermission'])->name('user.permission');
    Route::delete('/users/{user}/permission/{permission}', [UserController::class, 'removePermission'])->name('user.permission.revoke');
    // Route::resource('/roles', RoleController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboardVI/kpi-grafik', [DashboardUserController::class, 'grafik']);
    Route::resource('/dashboardVI', DashboardUserController::class); //route ke dashboard Verdanco Indonesia
    Route::get('/revenueVI/tipe-pekerjaan', [DashboardUserController::class, 'jobchartVI']);
    Route::get('/deptVI', [DashboardDeptVIController::class, 'index'])->name('deptVI');
    Route::get('/deptVE', [DashboardDeptVEController::class, 'index'])->name('deptVE');
    Route::get('/CorVE', [CorporateveController::class, 'index'])->name('CorVE');
    Route::get('/CorpVI', [CorpVIController::class, 'index'])->name('CorpVI');
    

    Route::get('/deptVI/it',[DashboardDeptVIController::class, 'viewit'])->name('viewit');

    // Route::resource('/dashboardVE', DashboardUserVEController::class)->middleware('auth');
});

Route::middleware(['auth'])->group( function () {
    Route::resource('/departements', DepartementController::class);
    Route::resource('/kpipdca', PDCAController::class);
    Route::resource('/realization', realizationController::class);
    Route::resource('/kpiit', ITController::class);
    Route::resource('/viitem', viitemController::class);
    Route::resource('/veitem', veitemController::class);
    // Route::resource('/realization-pdca', RealizationpdcaController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
