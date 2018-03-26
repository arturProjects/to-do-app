<?php

Route::group(['module' => 'Task', 'middleware' => ['api'], 'namespace' => 'App\Modules\Task\Controllers'], function() {

    Route::resource('Task', 'TaskController');

});
