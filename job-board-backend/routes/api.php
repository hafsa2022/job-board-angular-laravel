<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ApplicationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(UserController::class)->group(function () {

        Route::post('login','getUser');

        Route::post('signup','addUser');

        Route::get('getallusers','getAllUsers');

    });

Route::controller(ProfileController::class)->group(function () {

        Route::post('getprofile','getProfile');

        Route::get('getallprofiles','getAllProfiles');

        Route:: post('getprofiles','getProfiles');

        Route::post('addprofile','addProfile');

        Route::post('updateprofile', 'updateProfile');

    });

Route::controller(JobController::class)->group(function () {

        Route::post('addjob','addJob');

        Route::post('updatejob','updateJob');

        Route::get('getalljobs','getAllJobs');

        Route::get('getlastjobs','getLastJobs');

        Route::post('searchjobs','searchJobs');
});

Route::controller(CompanyController::class)->group(function () {

        Route::post('addcompany','addCompany');

        Route::post('updatecompany','updateCompany');

        Route::get('getallcompanies','getAllCompanies');
});

Route::controller(ApplicationController::class)->group(function () {

        Route::post('applyjob','addApplication');

        Route::get('getallapplications','getAllApplications');
});

