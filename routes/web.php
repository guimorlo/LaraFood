<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->namespace('Admin')->group(function ()
{
    /*
    * Plan Routes
    */
    Route::prefix('plans')->group(function ()
    {
        /*
        * Plan Details Routes
        */
        Route::post('{url}/details/', 'DetailPlanController@store')->name('plans.details.store');
        Route::get('{url}/details/create', 'DetailPlanController@create')->name('plans.details.create');

        Route::put('{url}', 'PlanController@update')->name('plans.update');
        Route::get('{url}/edit', 'PlanController@edit')->name('plans.edit');
        Route::get('create', 'PlanController@create')->name('plans.create');
        Route::any('search', 'PlanController@search')->name('plans.search');
        Route::delete('{url}', 'PlanController@destroy')->name('plans.destroy');
        Route::get('{url}', 'PlanController@show')->name('plans.show');
        Route::post('/', 'PlanController@store')->name('plans.store');
        Route::get('/', 'PlanController@index')->name('plans.index');
    });

    Route::get('/', 'PlanController@index')->name('admin.index');
});




Route::get('/', function () {
    return redirect()->route('plans.index');
})->name('root');
