<?php

Route::prefix('v1')->namespace('\App\Acme\Controllers')->group(function() {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::put('logout', 'AuthController@logout');
    Route::post('forgot-password', 'AuthController@forgotPassword');
    Route::put('reset-password', 'AuthController@resetPassword');
    Route::put('verify-email/{token}', 'AuthController@verifyEmail');
    Route::put('reset-email', 'AuthController@resetEmail');
    Route::put('refresh-token', 'AuthController@refreshToken');

    // Users
    Route::get('users', 'UserController@index');
    Route::post('users', 'UserController@create');
    Route::get('users/{userId}', 'UserController@show')->where('userId', '[0-9]+');
    Route::put('users/{userId}', 'UserController@update')->where('userId', '[0-9]+');
    Route::delete('users/{userId}', 'UserController@destroy')->where('userId', '[0-9]+');
    Route::get('users/check-email', 'UserController@checkEmail');

    

    // Me
    Route::get('me', 'MeController@show');
    Route::put('me', 'MeController@update');
    Route::put('me/update-email', 'MeController@updateEmail');
    Route::put('me/reset-password', 'MeController@resetPassword');



    Route::get('categories', 'CategoryController@index');
    Route::get('pay-types', 'PayTypeController@index');


    // Jobs
    Route::get('jobs', 'JobController@index');
    Route::post('jobs', 'JobController@create');
    Route::post('jobs/publish', 'JobController@publish');
    Route::put('jobs/{jobUuid}', 'JobController@update');
    Route::get('jobs/{jobUuid}', 'JobController@show');
    Route::get('jobs/{jobUuid}/applications', 'JobController@showJobApplications');
    Route::put('jobs/{jobUuid}/expire', 'JobController@expire');
    Route::put('jobs/{jobUuid}/save-ecomm', 'JobController@saveEcomm');
    Route::delete('jobs/{jobUuid}', 'JobController@destroy');

    // Locations
    Route::get('locations', 'LocationController@index');

});