<?php

use App\Http\Controllers\AdministrationApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HouseApiController;
use App\Http\Controllers\MedicineApiController;
use App\Http\Controllers\PetApiController;
use App\Http\Controllers\PictureApiController;
use App\Http\Controllers\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth', 'controller' => AuthController::class], function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});


Route::group(['prefix' => 'users', 'controller' => UserApiController::class, 'middleware' => 'auth:api'], function () {
    Route::get('{id}', 'getUserById');
    Route::get('', 'getLoggedInUser');
});

Route::group(['prefix' => 'houses', 'controller' => HouseApiController::class, 'middleware' => 'auth:api'], function () {
    Route::get('', 'getHouseLoggedInUser');
    Route::get('guests', 'getGuests');
    Route::get('{houseId}/pets', 'getPetsOfHouse');
    Route::post('', 'createHouse');
    Route::post('guests/{guestId}', 'addGuest');
});

Route::group(['prefix' => 'pets', 'controller' => PetApiController::class, 'middleware' => 'auth:api'], function () {
    Route::get('{petId}', 'getPet');
    Route::get('{petId}/house', 'getHouseOfPet');
    Route::post('', 'createOrUpdate');
    Route::put('{petId}', 'createOrUpdate');
    Route::delete('{petId}', 'deletePet');
});

Route::group(['prefix' => 'pictures', 'controller' => PictureApiController::class, 'middleware' => 'auth:api'], function () {
    Route::get('house/{houseId}', 'getPicturesHouse');
    Route::get('pet/{petId}', 'getPicturesPet');
    Route::post('/new', 'savePicture');
});

Route::group(['prefix' => 'administrations', 'controller' => AdministrationApiController::class, 'middleware' => 'auth:api'], function () {
    Route::get('pet/{id}', 'getPetAdministrations');
    Route::get('house/{id}', 'getHouseAdministrations');
    Route::post('{id}/done', 'setAdministrationDone');
});

Route::group(['prefix' => 'medicines', 'controller' => MedicineApiController::class, 'middleware' => 'auth:api'], function () {
    Route::get('{id}', 'getMedicineById');
    Route::post('', 'createOrUpdate');
    Route::put('{medicineId}', 'createOrUpdate');
});
