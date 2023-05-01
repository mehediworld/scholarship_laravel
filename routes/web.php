<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScholarshipApplicationController;
use App\Http\Controllers\ThankYouController;

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
Route::get('scholarship_applications/thankyou', 'App\Http\Controllers\ScholarshipApplicationController@thankyou')->name('scholarship_applications.thankyou');
Route::get('/thanas/{districtId}', 'App\Http\Controllers\ScholarshipApplicationController@getThanasByDistrict');
Route::get('/', function () {
    return view('welcome');
});
Route::resource('/scholarship_applications', ScholarshipApplicationController::class);
// routes/web.php



