<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api;
use App\Http\Controllers\NovaApi;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Authentication
Route::prefix('user')->group(function () {
    Route::post('/register', [Api\UserController::class, 'register']);
    Route::post('/login', [Api\UserController::class, 'login']);

    // /send-reset-password-link
    Route::post('/send-reset-password-link', [Api\UserController::class, 'sendResetPasswordLink']);
    Route::post('/reset-password', [Api\UserController::class, 'resetPassword']);
});


// User dashboard
Route::prefix('user')->middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [Api\UserController::class, 'logout']);
    Route::get('/', [Api\UserController::class, 'profile']);
    Route::post('/update-profile', [Api\UserController::class, 'update']);
    // Update avatar
    Route::post('/update-user-avatar', [Api\UserController::class, 'updateAvatar']);

    // Change password
    Route::post('/setting/update-password', [Api\UserController::class, 'updatePassword']);

    // Lead
    Route::post('/save-lead', [Api\LeadController::class, 'saveLead']);
    // save-recent
    Route::post('/save-recent', [Api\PropertyController::class, 'saveRecent']);
    // Bookmark / favourite / Save
    Route::post('/property/manage/favourite-property', [Api\PropertyController::class, 'saveFavourite']);
    // Bookmark / favourite / Get
    Route::get('/property/bookmarks', [Api\PropertyController::class, 'getFavourite']);
    Route::post('/property/recent', [Api\PropertyController::class, 'getRecent']);
});

// Property
Route::prefix('property')->group(function () {
    Route::get('/properties', [Api\PropertyController::class, 'getProperties']);
    Route::get('/get-details', [Api\PropertyController::class, 'getDetails']);
    Route::post('/search', [Api\PropertyController::class, 'searchProperty']);
    Route::get('/get-autocomplete', [Api\PropertyController::class, 'getAllAutocomplete']);
});

// Leads
Route::prefix('lead')->group(function () {
    Route::post('/new-guest', [Api\LeadController::class, 'saveLeadGuest']);
});

// News letters
Route::prefix('newsletter')->group(function () {
    Route::post('/subscribe', [Api\NewsLetterController::class, 'save']);
});

// Save contact - contact
Route::post('/user/contact', [Api\ContactController::class, 'store']);

// Master search - using key
Route::get('/search', [Api\MasterSearchController::class, 'search']);



/*
* NOVA API - Will use these APIs for Nova CRM
* These all APIs will required a Sanctum token (excepted Auth Login)
* Developer: Synch Soft Technology : Ajay Kumar
*/

// Nova APIs
Route::prefix('crm')->group(function () {
    // nova Login
    Route::post('/login', [NovaApi\AuthController::class, 'login']);
    Route::group(['prefix' => 'facebook'], static function () {
        Route::get('login',[\App\Http\Controllers\Api\FacebookController::class,'login']);
        Route::get('callback',[\App\Http\Controllers\Api\FacebookController::class,'callback']);
    });
});
Route::prefix('crm')->middleware(['auth:sanctum'])->group(function () {
    // nova Logout
    Route::post('/logout', [NovaApi\AuthController::class, 'logout']);

    // Nova Getting all leads as people
    Route::get('/people/all', [NovaApi\LeadController::class, 'people']);

    // Adding new people
    Route::post('/people/new', [NovaApi\LeadController::class, 'create']);

    // Getting a people details
    Route::get('/people/get-details/{id}', [NovaApi\LeadController::class, 'getPeopleWithUserId']);
    Route::get('/people-filters-data/{type}', [NovaApi\LeadController::class, 'getFilters']);
    Route::group(['prefix' => 'facebook'], static function () {
        Route::get('check-is-connected',[\App\Http\Controllers\Api\FacebookController::class,'isConnected']);
        Route::get('pages',[\App\Http\Controllers\Api\FacebookController::class,'pages']);
        Route::post('pages/{page}/subscribe',[\App\Http\Controllers\Api\FacebookController::class,'subscribePage']);
        Route::get('leads/{page}',[\App\Http\Controllers\Api\FacebookController::class,'leads']);
    });
});


// testing route
Route::get('/send-test-mail', [Api\UserController::class, 'sendTestMail']);

// Default -- API
Route::get('/', function () {
    dd('Welcome to remax.');
});
