<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('mbg');
})->name('home');

Route::get('/data', function () {
    return view('data_detail');
})->name('data');

Route::get('/regulasi', function () {
    return view('regulasi_detail');
})->name('regulasi');

Route::get('/faq', function () {
    return view('faq_detail');
})->name('faq');
