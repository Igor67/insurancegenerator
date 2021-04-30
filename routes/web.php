<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassportController;
use \App\Http\Controllers\InsuranceController;
use App\Models\clients;
use App\Models\insurance;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/insurance/create');
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('insurance/people/preview', [\App\Http\Controllers\insuranceAddController::class, 'previewPeople'])->name('people');

Route::get('insurance/firms/preview', [\App\Http\Controllers\insuranceAddController::class, 'previewFirms'])->name('firms');

Route::get('insurance/myInsurances/preview', [\App\Http\Controllers\insuranceAddController::class, 'previewDocs'])->name('myInsurances');

Route::get('printBill/{passport}', function ($passport) {
    $client = clients::where('passportNumber', 'LIKE', '%' . $passport . '%')->get();
    $insurance = insurance::where('passportNumber', 'LIKE', '%' . $passport . '%')->get();
    $insurance = $insurance[count($insurance) - 1];
    $client = $client[count($client) - 1];
    $date = explode('-', $insurance->createDate);
    $date = $date[2] . '.' . $date[1] . '.' . $date[0];
    return view('insurance.print.check', compact('client', 'insurance', 'date'));
});

Route::get('/print', [\App\Http\Controllers\insuranceAddController::class, 'print'])->name('print');

Route::get('/liveSearch', [InsuranceController::class, 'getUsers']);
Route::get('/liveSearchInsurance', [InsuranceController::class, 'getInsurances']);
Route::get('/liveSearchFirms', [InsuranceController::class, 'getFirms']);
Route::resource('insurance', '\App\Http\Controllers\insuranceAddController');
Route::resource('report', '\App\Http\Controllers\reportController');
//Route::resource('insuranceData', '\App\Http\Controllers\insuranceController');
