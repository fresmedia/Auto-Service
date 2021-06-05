<?php

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

// Route::prefix('service')->group(function() {
//     Route::get('/', 'ServiceController@index');
// });

use Illuminate\Support\Facades\Route;
use Modules\Service\Http\Controllers\ServiceLocationController as TrashServiceLocationController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    /**
     * Location Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('locations', ServiceLocationController::class);
        Route::get('locations/trashed/view', [TrashServiceLocationController::class, 'trashed'])->name('locations.trashed');
        Route::delete('locations/trashed/destroy/{id}', [TrashServiceLocationController::class, 'destroyTrash'])->name('locations.trashed.destroy');
        Route::put('locations/trashed/revert/{id}', [TrashServiceLocationController::class, 'revertFromTrash'])->name('locations.trashed.revert');
    });

});
