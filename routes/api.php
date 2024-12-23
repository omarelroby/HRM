<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\AttandanceController;
use App\Http\Controllers\API\MettingController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\PayrollController;
use API\TicketController;


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

Route::middleware('auth:sanctum')->get('v1/user', function (Request $request) {
    return $request->user();
});

// Route::post('/employee_attandance', 'API\AttandanceController@store');
// Route::post('/employee_attandance/{id}', 'API\AttandanceController@update');

Route::post('/create_request', 'API\HomeController@create_request');

Route::group(['prefix' => 'v1/employee'], function () {

    Route::post('login', [AuthController::class, 'login']);
    Route::group(['middleware' => 'auth:sanctum'], function() {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('profile', [ProfileController::class, 'index']);
        Route::post('update_picture' , [ProfileController::class , 'update_picture']);
        Route::post('reset_password' , [ProfileController::class , 'reset']);
        Route::get('me', [ProfileController::class, 'me']);
        Route::get('home' , [HomeController::class , 'index']);
        Route::get('attendance' , [AttandanceController::class , 'index']);
        Route::post('start_work' , [AttandanceController::class , 'start_work']);
        Route::post('end_work' , [AttandanceController::class , 'end_work']);
        Route::get('meetings' , [MettingController::class , 'index']);
        Route::get('events' , [EventController::class , 'index']);
        Route::resource('ticket' , TicketController::class);
        Route::get('payroll', [PayrollController::class , 'index']);
        Route::get('documents', [ProfileController::class , 'documents']);
        Route::get('tree/{id}',[HomeController::class , 'tree']);

    });
});
