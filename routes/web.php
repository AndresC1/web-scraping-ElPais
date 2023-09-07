<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::get('/', function () {
    return redirect('/news');
});

Route::get('/info/{country}/{date}/{title}', [NewsController::class, 'info'])->name('info');
Route::get('/news/{country}', [NewsController::class, 'newsCountry']);
Route::get('/news', [NewsController::class, 'home']);
