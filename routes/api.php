<?php

use App\Http\Controllers\Api\V1\MenuController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/menus/{slug}', [MenuController::class, 'show'])->name('api.v1.menus.show');
});
