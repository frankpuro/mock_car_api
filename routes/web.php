<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return redirect()->away('https://github.com/frankpuro/mock_car_api.git');
});

