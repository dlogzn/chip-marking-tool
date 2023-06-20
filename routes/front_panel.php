<?php
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\FrontPanel\HomeController;


Route::get('/', [HomeController::class, 'index']);
Route::get('/get/craving/image', [HomeController::class, 'getCravingImage']);
Route::post('/crave/on/image', [HomeController::class, 'craveOnImage']);
