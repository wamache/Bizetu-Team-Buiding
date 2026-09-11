<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LandingController;

Route::get('/', LandingController::class)
    ->name('home');

Route::get('/pages/{slug}', [FrontendController::class, 'show'])
    ->name('pages.show');
