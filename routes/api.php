<?php

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

Route::apiResources([
  'user' => 'API\UserController'
]);

Route::middleware('auth:api')->get('/eladas', function (Request $request) {
  return $request->Eladasok();
});

Route::apiResources([
'eladas' => 'API\EladasController'
]);


Route::middleware('auth:api')->get('/vetel', function (Request $request) {
  return $request->Vetelek();
});

Route::apiResources([
'vetel' => 'API\VetelController'
]);

Route::middleware('auth:api')->get('/kuldottek', function (Request $request) {
  return $request->Kuldottek();
});

Route::apiResources([
'kuldottek' => 'API\KuldottekController'
]);

Route::middleware('auth:api')->get('/kozep', function (Request $request) {
  return $request->Mnb();
});

Route::apiResources([
'kozep' => 'API\MnbController'
]);
