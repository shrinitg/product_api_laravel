<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\adminController;
use App\Http\Controllers\usercontroller;

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

//////////////   admin routes    //////////////////////////

Route::get('admin/getDataUnp', [adminController::class, 'getDataUnp']);
Route::get('admin/getDataPur', [adminController::class, 'getDataPur']);
Route::post('admin/create', [adminController::class, 'create']);
Route::post('admin/update/{id}', [adminController::class, 'update']);
Route::get('admin/getPriceHist/{year}', [adminController::class, 'getPriceHist']);

///////////////////////////////////////////////////////////

/////////////    user routes    ///////////////////////////

Route::post('user/purchase', [usercontroller::class, 'purchase']);
Route::get('user/getDataUnp', [usercontroller::class, 'getDataUnp']);

///////////////////////////////////////////////////////////