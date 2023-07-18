<?php

use App\Http\Livewire\Batteries\AddSiteBatteries;
use App\Http\Livewire\SnagToSite;
use Illuminate\Support\Facades\Route;

Route::get('/', [
    App\Http\Controllers\DashboardController::class, 'index'
])->name('dashboard');

Route::resource('permissions', App\Http\Controllers\PermissionController::class);
Route::post('permissions/loadFromRouter', [App\Http\Controllers\PermissionController::class, 'LoadPermission'])->name('permissions.load-router');

Route::resource('roles', App\Http\Controllers\RoleController::class);

Route::get('profile', [App\Http\Controllers\UserController::class, 'showProfile'])->name('users.profile');
Route::patch('profile', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('users.updateProfile');

Route::resource('users', App\Http\Controllers\UserController::class);


Route::resource('attendances', App\Http\Controllers\AttendanceController::class);

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('generator_builder.index');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('generator_builder.field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('generator_builder.relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('generator_builder.generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('generator_builder.rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('generator_builder.from_file');


Route::resource('fileUploads', App\Http\Controllers\FileUploadController::class);

Route::resource('sites', App\Http\Controllers\SiteController::class);


Route::resource('offices', App\Http\Controllers\OfficeController::class);

Route::resource('regions', App\Http\Controllers\RegionController::class);
Route::resource('governs', App\Http\Controllers\GovernController::class);
Route::resource('wilayats', App\Http\Controllers\WilayatController::class);
Route::resource('categs', App\Http\Controllers\CategController::class);
Route::get('/gen-permissions/{model}/{url?}', [App\Http\Controllers\DashboardController::class,'generatePermissions'])->name('insert.permissions');

Route::resource('testings', App\Http\Controllers\TestingController::class);

Route::resource('testnews', App\Http\Controllers\TestnewController::class);

Route::resource('snag-domains', App\Http\Controllers\SnagdomainController::class);

Route::resource('imports', App\Http\Controllers\SnagsController::class);
Route::resource('snags', App\Http\Controllers\SnagsController::class);
Route::get('snags-export', [App\Http\Controllers\SnagsController::class,'export'])->name('snags.export');
Route::get('snags-import', [App\Http\Controllers\SnagsController::class,'import'])->name('snags.import');

Route::resource('snag-statuses', App\Http\Controllers\SnagstatusController::class);

Route::resource('snagmangs', App\Http\Controllers\SnagmangController::class);

Route::resource('site-snags', App\Http\Controllers\SiteSnagController::class);

Route::resource('snag-remarks', App\Http\Controllers\SnagremarkController::class);

Route::resource('snag-sources', App\Http\Controllers\SnagreporterController::class);

Route::resource('site-categs', App\Http\Controllers\SiteCategController::class);

Route::resource('site-prios', App\Http\Controllers\SitePrioController::class);

Route::resource('site-types', App\Http\Controllers\SiteTypeController::class);

Route::resource('assets', App\Http\Controllers\AssetController::class);

Route::resource('assets-details', App\Http\Controllers\AssetDetailController::class);

Route::get('add-snag-to-site', SnagToSite::class)->name('snag-to-site');
Route::get('add-battery', AddSiteBatteries::class)->name('add-battery');
Route::get('add-batteries-to-site', AddSiteBatteries::class)->name('battery-to-site');


Route::resource('battery-add', App\Http\Controllers\BatteryAddController::class);
// Route::get('battery-add', App\Http\Livewire\Batteries\ListSiteBatteries::class)->name('battery-add.index');



Route::resource('passive-spares', App\Http\Controllers\PassiveSpareController::class);

Route::resource('consumable-spares', App\Http\Controllers\ConsumableSpareController::class);
// Route::get('consumable-spares', App\Http\Livewire\ConsumableForm::class)->name('consumable-spares.index');


Route::resource('siteExtras', App\Http\Controllers\SiteExtraController::class);
Route::resource('storms', App\Http\Controllers\StormController::class);


Route::resource('tickets', App\Http\Controllers\TicketController::class);
Route::get('tickets-mail', [App\Http\Controllers\TicketController::class,'mailView'])->name('tickets.mail');


Route::resource('alarmCategs', App\Http\Controllers\AlarmCategController::class);


Route::resource('contractors', App\Http\Controllers\ContractorController::class);


Route::resource('otcSites', App\Http\Controllers\OtcSitesController::class);


Route::resource('otcScopes', App\Http\Controllers\OtcScopeController::class);





Route::resource('otcCategs', App\Http\Controllers\OtcCategController::class);
Route::resource('site_access', App\Http\Controllers\SiteAccessController::class);


Route::resource('otcAlarms', App\Http\Controllers\OtcAlarmsController::class);
Route::get('sendmail', [App\Http\Controllers\TicketController::class ,'send']);


Route::resource('tTStatuses', App\Http\Controllers\TTStatusController::class);
