<?php

// use ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('sites-all', [App\Http\Controllers\API\SiteAPIController::class,'index'])->name('sites.all');
// Route::apiResource('sites', App\Http\Controllers\API\SiteAPIController::class);


Route::resource('regions',\App\Http\Controllers\API\RegionAPIController::class);




Route::resource('testings', App\Http\Controllers\API\TestingAPIController::class);


Route::resource('testnews', App\Http\Controllers\API\TestnewAPIController::class);


Route::resource('snagdomains', App\Http\Controllers\API\SnagdomainAPIController::class);


Route::resource('snagstatuses', App\Http\Controllers\API\SnagstatusAPIController::class);


// Route::resource('snagmangs', App\Http\Controllers\API\SnagmangAPIController::class);
// Route::resource('snagmangs', App\Http\Controllers\API\SnagmangAPIController::class);


Route::resource('site_snags', App\Http\Controllers\API\SiteSnagAPIController::class);


Route::resource('snagremarks', App\Http\Controllers\API\SnagremarkAPIController::class);


Route::resource('snagreporters', App\Http\Controllers\API\SnagreporterAPIController::class);


Route::resource('site_categs', App\Http\Controllers\API\SiteCategAPIController::class);


Route::resource('site_prios', App\Http\Controllers\API\SitePrioAPIController::class);


Route::resource('site_types', App\Http\Controllers\API\SiteTypeAPIController::class);


Route::resource('passive_spares', App\Http\Controllers\API\PassiveSpareAPIController::class);


Route::resource('site_extras', App\Http\Controllers\API\SiteExtraAPIController::class);


Route::resource('tickets', App\Http\Controllers\API\TicketAPIController::class);


Route::resource('alarm_categs', App\Http\Controllers\API\AlarmCategAPIController::class);


Route::resource('contractors', App\Http\Controllers\API\ContractorAPIController::class);


Route::resource('otc_sites', App\Http\Controllers\API\otc_sitesAPIController::class);


Route::resource('otc_scopes', App\Http\Controllers\API\OtcScopeAPIController::class);


Route::resource('otc_categs', App\Http\Controllers\API\OtcCategAPIController::class);


Route::resource('otc_alarms', App\Http\Controllers\API\OtcAlarmsAPIController::class);
