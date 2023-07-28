<?php

use App\Http\Controllers\AdTypeController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Models\Ad_type;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [AuthController::class, 'register']); // регистрация пользователя
Route::post('/login', [AuthController::class, 'login']); // авторизация, возвращает токен
Route::post('/logout', [AuthController::class, 'logout']); // делает недействительным токен
Route::post('/refresh', [AuthController::class, 'refresh']); // обновить токен пользователя

Route::get('/ad_types', [AdTypeController::class, 'index']); // получить список типов (услуга или товар)
Route::get('/ad_types/{type_id}', [AdTypeController::class, 'show']); // получить конкретный тип

Route::get('/advertisement', [AdvertisementController::class, 'index']); // информация о всех объявлениях
Route::get('/advertisement/{ad_id}', [AdvertisementController::class, 'show']); // информация о конкретноим объявлении
Route::post('/advertisement', [AdvertisementController::class, 'store']); // добавление объявления

Route::get('/category', [CategoryController::class, 'index']); // получить список категорий
Route::get('/category/{cat_id}', [CategoryController::class, 'show']); // получить информацию о конкретной категории
Route::post('/category', [CategoryController::class, 'store']); // добавить объявление

















