<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\ShortLinkController;
use App\Http\Controllers\ShortUrlController;
use App\Models\ShortUrl;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

/**
 * Auth
 */
Route::post('/shorten', [ShortLinkController::class, 'shorten'])->name('shorten');
Route::get('/{code}', [ShortLinkController::class, 'redirect'])->name('redirect');

Route::middleware('auth')->group(function(){    
    Route::get('/admin', [AdminsController::class, 'index'])->name('admin.index');

Route::get('/delete/{short_code}', [ShortLinkController::class, 'delete'])->name('delete');


});