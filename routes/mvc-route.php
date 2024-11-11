<?php
use Illuminate\Support\Facades\Route;
Route::group(['prefix'=>config('mvc.route_prefix')], function () { // remove this line if you dont have route group prefix
    Route::group(['middleware'=>['userRoles']], function () {
		//unor
		Route::prefix('unor')->as('unor')->group(function () {
			Route::get('data', 'Unor\UnorController@data');
			Route::get('delete/{id}', 'Unor\UnorController@delete');
		});
		Route::resource('unor', 'Unor\UnorController');
		//end-unor
		//tamu
		Route::prefix('tamu')->as('tamu')->group(function () {
			Route::get('data', 'Tamu\TamuController@data');
			Route::get('delete/{id}', 'Tamu\TamuController@delete');
		});
		Route::resource('tamu', 'Tamu\TamuController');
		//end-tamu
		//{{route replacer}} DON'T REMOVE THIS LINE
    });
});
