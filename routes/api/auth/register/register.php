<?php

use Illuminate\Routing\Route;

Route::prefix('register')->group(function () {
    Route::post('/', [RegisterController::class, 'store']);
});