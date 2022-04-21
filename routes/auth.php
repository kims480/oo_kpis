<?php

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
Route::get('/gen-permissions/{model}', [App\Http\Controllers\RegionController::class,'generatePermissions'])->name('insert.permissions');




Route::resource('testings', App\Http\Controllers\TestingController::class);


Route::resource('testnews', App\Http\Controllers\TestnewController::class);


Route::resource('snagdomains', App\Http\Controllers\SnagdomainController::class);

Route::resource('imports', App\Http\Controllers\SnagsController::class);


Route::resource('snagstatuses', App\Http\Controllers\SnagstatusController::class);


Route::resource('snagmangs', App\Http\Controllers\SnagmangController::class);


Route::resource('siteSnags', App\Http\Controllers\SiteSnagController::class);


Route::resource('snagremarks', App\Http\Controllers\SnagremarkController::class);


Route::resource('snagreporters', App\Http\Controllers\SnagreporterController::class);


Route::resource('siteCategs', App\Http\Controllers\SiteCategController::class);


Route::resource('sitePrios', App\Http\Controllers\SitePrioController::class);


Route::resource('siteTypes', App\Http\Controllers\SiteTypeController::class);
Route::resource('assets', App\Http\Controllers\AssetController::class);
Route::resource('assets-details', App\Http\Controllers\AssetDetailController::class);
