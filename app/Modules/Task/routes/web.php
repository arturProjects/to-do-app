<?php

Route::group(['module' => 'Task', 'middleware' => ['web'], 'namespace' => 'App\Modules\Task\Controllers'], function() {

    Route::resource('Task', 'TaskController');

});
