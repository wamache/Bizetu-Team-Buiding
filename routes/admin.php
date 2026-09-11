<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => config('twill.admin_middleware_group', 'twill_auth')], function () {
    Route::module('pages');
    Route::module('menus');
    Route::module('menuTypes');
    Route::module('sliders');
    Route::module('platformSettings');
});
