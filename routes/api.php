<?php


use App\Http\Controllers\ReportController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\FoodToEatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*

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


Route::group(['prefix' => 'q1'], function () {
    Route::get('/transaction', [TransactionController::class, 'getTransaction']);
    Route::post('/transaction', [TransactionController::class, 'createTransaction']);
    Route::put('/transaction/{id}', [TransactionController::class, 'update']);
    Route::delete('/transaction/{id}', [TransactionController::class, 'delete']);
});

Route::group(['prefix' => 'q1'], function () {
    Route::get('/report/category', [ReportController::class, 'getReportByCategory']);
    Route::put('/report/category/{id}', [ReportController::class, 'updateReporCategoryById']);
    Route::delete('/report/category/{id}', [ReportController::class, 'deleteReporCategory']);
    Route::get('/report/date', [ReportController::class, 'getReportByDate']);
    // Route::put('/report/date/{date}/{id}', [ReportController::class, 'updateReportByDate']);
    // Route::delete('/report/date/{date}/{id}', [ReportController::class, 'deleteReporCategory']);
});

Route::group(['prefix' => 'q2'], function () {
    Route::get('/foodsToEat', [FoodToEatController::class, 'getFoodToEatAll']);
    Route::get('/foodsToEat/{id}', [FoodToEatController::class, 'getFoodToEat']);
    Route::post('/foodsToEat', [FoodToEatController::class, 'createFoodToEat']);
    Route::put('/foodsToEat/{id}', [FoodToEatController::class, 'updateFoodToEat']);
    //Route::delete('/foodsToEat/{id}', [FoodToEatController::class, 'delete']);
});




Route::get('test', function () {
    return 'Hiiiii';
});
