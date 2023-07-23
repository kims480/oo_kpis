<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
Auth::routes();

Route::get('/', function () {
    return redirect(route('dashboard'));
})->name('home');

Route::get('/checkOnline', function (App\Repositories\AttendanceRepository $attendanceRepo) {
    if (Auth::check()) { }
    return $attendanceRepo->CountUserOnline();
})->name('checkOnline');

Route::resource('snags-managing',\App\Http\Controllers\SnagsController::class);
Route::get('site-snags',[\App\Http\Controllers\SnagsController::class,'getSiteSnags'])->name('site.snags');
// Route::get('/gen-permissions/{model}/{url?}', [App\Http\Controllers\DashboardController::class,'generatePermissions'])->name('insert.permissions');
// Route::livewire('/consumable-spares', 'ConsumableForm')->name('consumable-spares.index');
// Route::livewire('/battery-add', 'batteries/ListSiteBatteries')->name('battery-add.index');


Route::get('employee-contract_confim',[\App\Http\Controllers\EmployeeController::class,'contract_confirmation'])->name('employees.contract');
