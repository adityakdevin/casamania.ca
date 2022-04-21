<?php

use Illuminate\Support\Facades\Route;
Route::match(['GET','POST'],'facebook-leadgen-integration-webhook',[\App\Http\Controllers\Api\FacebookController::class,'webhook']);
Route::get('/{any}', static function () {
    return view('layouts.vue');
})->where('any', '.*');
