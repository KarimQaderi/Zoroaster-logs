<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'KarimQaderi\ZoroasterLogViewer\Http\Controllers'], function () {

//    Route::get('get_chart_data','ZoroasterLogViewerController@getChartData');
    Route::get('get_list_logs','ZoroasterLogViewerController@getListLogs')->name('getListLogs');
    Route::get('download/{date}','ZoroasterLogViewerController@download')->name('download');
    Route::get('get/{date}/{level}','ZoroasterLogViewerController@showByLevel')->name('showByLevel');

    Route::get('delete','ZoroasterLogViewerController@delete')->name('delete');
});
