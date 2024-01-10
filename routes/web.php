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

use App\Http\Controllers\corporate\CorpVEController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // Route::get('/revenueVI/tipe-pekerjaan', [DashboardUserController::class, 'jobchartVI']);
    //dashboard departement vi
    Route::get('/deptVI', [DashboardDeptVIController::class, 'index'])->name('deptVI');
    //dashboard departement ve
    Route::get('/deptVE', [DashboardDeptVEController::class, 'index','corp'])->name('deptVE');
    // Route::get('/deptVE', [DashboardDeptVEController::class, 'corp'])->name('deptVE');
    //dashboard corporate vi
    Route::get('/CorVE', [CorporateveController::class, 'index'])->name('CorVE');
    //dashboard corporate ve
    Route::get('/CorpVI', [CorpVIController::class, 'index'])->name('CorpVI');

    // Route::get('/track-visitor', [VisitorController::class, 'trackVisitor']);

    Route::get('/CorpVE', [CorpVEController::class, 'index'])->name('CorpVE');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
