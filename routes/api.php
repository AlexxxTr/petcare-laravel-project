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

Route::prefix('users')->group(function () {
    Route::get('/{id}', [UserApiController::class, 'getUserById']);
    Route::get('/', [UserApiController::class, 'getLoggedInUser']);
});

Route::prefix('houses')->group(function () {
    Route::get('/', [HouseApiController::class, 'getHouseLoggedInUser']);
    Route::get('/guests', [HouseApiController::class, 'getGuests']);
    Route::get('/{houseId}/pets', [HouseApiController::class, 'getPetsOfHouse']);
    Route::post('/', [HouseApiController::class, 'createHouse']);
    Route::post('/guests/{guestId}', [HouseApiController::class, 'addGuest']);
});

Route::prefix('pets')->group(function () {
    Route::get('/{petId}', [PetApiController::class, 'getPet']);
    Route::get('/{petId}/house', [PetApiController::class, 'getHouseOfPet']);
    Route::post('/', [PetApiController::class, 'createOrUpdate']);
    Route::put('/{petId}', [PetApiController::class, 'createOrUpdate']);
    Route::delete('/{petId}', [PetApiController::class, 'deletePet']);
});

Route::prefix('administrations')->group(function () {
    Route::get('/pet/{id}', [AdministrationApiController::class, 'getPetAdministrations']);
    Route::get('/house/{id}', [AdministrationApiController::class, 'getHouseAdministrations']);
});

Route::prefix('medicines')->group(function () {
    Route::get('/{id}', [MedicineApiController::class, 'getMedicineById']);
});
