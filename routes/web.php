<?php

use App\Http\Controllers\AppController as AppController;
use Illuminate\Support\Facades\Route;

Route::get('{all}', [AppController::class, 'index'])->where('all', '^((?!api).)*')->name('index');
