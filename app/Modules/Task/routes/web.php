<?php

Route::group(['module' => 'Task', 'middleware' => ['web'], 'namespace' => 'App\Modules\Task\Controllers'], function() {

    Route::get('/task/index', [
        'as' => 'task.index',
        'uses' => 'TaskController@index'
    ]);
    
    Route::get('/task/show/{id}', [
        'as' => 'task.show',
        'uses' => 'TaskController@show'
    ]);
    
    Route::get('/task/edit/{id}', [
        'as' => 'task.edit',
        'uses' => 'TaskController@edit'
    ]); 
    
    Route::post('/task/update', [
        'as' => 'task.update',
        'uses' => 'TaskController@update'
    ]); 
    
    Route::get('/task/destroy/{id}', [
        'as' => 'task.destroy',
        'uses' => 'TaskController@destroy'
    ]);
    
    Route::get('/task/create', [
        'as' => 'task.create',
        'uses' => 'TaskController@create'
    ]);

});
