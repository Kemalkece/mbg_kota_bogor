<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.beranda');
})->name('home');

Route::get('/data-detail', function () {
    return view('components.detail.data_detail');
})->name('data_detail');

Route::get('/regulasi-detail', function () {
    return view('components.detail.regulasi_detail');
})->name('regulasi_detail');

Route::get('/faq-detail', function () {
    return view('components.detail.faq_detail');
})->name('faq_detail');