<?php

use App\Http\Controllers\Frontsite\HomeController;

use App\Http\Controllers\Frontsite\Operational\ComplaintReportController;

use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\PermissionsController;
use App\Http\Controllers\Backsite\RolesController;
use App\Http\Controllers\Backsite\UsersController;

use App\Http\Controllers\Backsite\Profile\ProfilesController;

use App\Http\Controllers\Backsite\MasterData\CountryController;
use App\Http\Controllers\Backsite\MasterData\ProvinceController;
use App\Http\Controllers\Backsite\MasterData\RegencyController;
use App\Http\Controllers\Backsite\MasterData\DistrictController;
use App\Http\Controllers\Backsite\MasterData\UserTypeController;
use App\Http\Controllers\Backsite\MasterData\CategoryComplaintController;

use App\Http\Controllers\Backsite\Operational\ComplaintController;
use App\Http\Controllers\Backsite\Operational\ComplaintResponseController;

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

// frontsite ------------------------------- //

    // home ------------------------------- //
        Route::get('/', [HomeController::class, 'index'])->name('home');
        // select regency report
        Route::get('select/regency/report/{id}', [HomeController::class, 'select_regency_report'])->name('select_regency.report');
        // select district report
        Route::get('select/district/report/{id}', [HomeController::class, 'select_district_report'])->name('select_district.report');
    // end home ------------------------------- //


    // operational ------------------------------- //
        // complaint report
        Route::resource('complaint_report', ComplaintReportController::class);
    // end operational ------------------------------- //

// end fronsite ------------------------------- //


// backsite ------------------------------- //
Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth:sanctum', 'verified']], function () {

    // redirect after log in
    Route::redirect('/', '/backsite/dashboard');


    // dashboard ------------------------------- //
    Route::resource('dashboard', DashboardController::class);
    // dashboard ------------------------------- //


    // management access ------------------------------- //
        // Permissions
        Route::resource('permissions', PermissionsController::class);
        // roles
        Route::resource('roles', RolesController::class);
        // users ------------------------------- //
        Route::get('reset_password/users/{id}', [UsersController::class, 'reset_password'])->name('reset.password.users');
        Route::get('filter/users', [UsersController::class, 'filter'])->name('filter.users');
        Route::resource('users', UsersController::class);
        // end users ------------------------------- //
    // end management access ------------------------------- //


    // profile ------------------------------- //
        Route::put('update/account/{id}', [ProfilesController::class, 'update_account'])->name('update.account.profiles');
        Route::put('update/security/{id}', [ProfilesController::class, 'update_security'])->name('update.security.profiles');
        Route::put('upload/photo/{id}', [ProfilesController::class, 'upload'])->name('upload.photo.profiles');
        Route::get('reset/photo/{id}', [ProfilesController::class, 'reset'])->name('reset.photo.profiles');
        Route::resource('profiles', ProfilesController::class);
    // end profile ------------------------------- //


    // master data ------------------------------- //
        // country
        Route::resource('country', CountryController::class);
        // province
        Route::resource('province', ProvinceController::class);
        // regency
        Route::resource('regency', RegencyController::class);
        // district
        Route::resource('district', DistrictController::class);
        // user type
        Route::resource('user_type', UserTypeController::class);
        // category complaint
        Route::resource('category_complaint', CategoryComplaintController::class);
    // end master data ------------------------------- //


    // operational ------------------------------- //
        // complaint
        Route::get('filter/complaint', [ComplaintController::class, 'filter'])->name('filter.complaint');
        Route::resource('complaint', ComplaintController::class);
        // complaint resoponse
        Route::get('complaint_response/{id}/complaint', [ComplaintResponseController::class, 'complaint_response'])->name('complaint_response');
        Route::resource('complaint_response', ComplaintResponseController::class);
    // end operational ------------------------------- //
});
// end backsite ------------------------------- //
