<?php

use App\Http\Controllers\AdministrationApiController;
use App\Http\Controllers\HouseApiController;
use App\Http\Controllers\MedicineApiController;
use App\Http\Controllers\PetApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('users')->controller(UserApiController::class)->group(function () {
    Route::get('{id}', 'getUserById');
    Route::get('', 'getLoggedInUser');
});

Route::prefix('houses')->controller(HouseApiController::class)->group(function () {
    Route::get('', 'getHouseLoggedInUser');
    Route::get('guests', 'getGuests');
    Route::get('{houseId}/pets', 'getPetsOfHouse');
    Route::post('', 'createHouse');
    Route::post('guests/{guestId}', 'addGuest');
});

Route::prefix('pets')->controller(PetApiController::class)->group(function () {
    Route::get('{petId}', 'getPet');
    Route::get('{petId}/house', 'getHouseOfPet');
    Route::post('', 'createOrUpdate');
    Route::put('{petId}', 'createOrUpdate');
    Route::delete('{petId}', 'deletePet');
});

Route::prefix('administrations')->controller(AdministrationApiController::class)->group(function () {
    Route::get('pet/{id}', 'getPetAdministrations');
    Route::get('house/{id}', 'getHouseAdministrations');
    Route::post('{id}/done', 'setAdministrationDone');
});

Route::prefix('medicines')->controller(MedicineApiController::class)->group(function () {
    Route::get('{id}', 'getMedicineById');
    Route::post('', 'createOrUpdate');
    Route::put('{medicineId}', 'createOrUpdate');
});
