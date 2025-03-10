<?php

use App\Http\Controllers\Pdf;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

Route::match(['get', 'post'], '/generate_1', function (Request $request) {
    return Pdf::generate_1($request);
})->name('generate_1');

Route::match(['get', 'post'],'/generate_2', function (Request $request) {
    return Pdf::generate_2($request);
})->name('generate_2');

Route::match(['get', 'post'],'/generate_3', function (Request $request) {
    return Pdf::generate_3($request);
})->name('generate_3');

Route::match(['get', 'post'],'/generate_4', function (Request $request) {
    return Pdf::generate_4($request);
})->name('generate_4');
