<?php 

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ServiceController;


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('about-us', 'aboutUs')->name('about-us');
    Route::get('get-a-quote', 'getAQuote')->name('get-a-quote');
    Route::get('global-presence/{slug}', 'globalPresence')->name('global-presence');
    Route::get('email-template', 'emailTemplate')->name('email-template');
    Route::get('portfolio','portfolio')->name('portfolio');
    Route::get('exhibition/{slug}','exhibition')->name('exhibition');
    Route::post('quote-store','quoteStore')->name('quote-store');

});


Route::get('service/{slug}', [ServiceController::class, 'show'])->name('service');
