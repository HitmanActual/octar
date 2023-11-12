<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClusterController;
use App\Http\Controllers\ClusterImageController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::group(['prefix' => 'users'], function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::post('/', [CategoryController::class, 'store']);
});



Route::group(['prefix' => 'items'], function () {
    Route::get('/', [ItemController::class, 'index']);
    Route::post('/', [ItemController::class, 'store']);
});


Route::group(['prefix' => 'services'], function () {
    Route::get('/', [ServiceController::class, 'index']);
    Route::post('/', [ServiceController::class, 'store']);
});

Route::group(['prefix' => 'clusters'], function () {
    Route::get('/', [ClusterController::class, 'index']);
    Route::post('/', [ClusterController::class, 'store']);
});

Route::group(['prefix' => 'images'], function () {
    Route::get('/', [ClusterImageController::class, 'index']);
    //Route::post('/', [ClusterImageController::class, 'store'])->middleware('auth:api');
    Route::post('/', [ClusterImageController::class, 'store']);
    Route::get('/{id}', [ClusterImageController::class, 'show']);

});


Route::group(['prefix' => 'cats'], function () {
    Route::get('/', [CatController::class, 'index']);
    //Route::post('/', [CatController::class, 'store'])->middleware('auth:api');
    Route::post('/', [CatController::class, 'store']);
    Route::get('/{id}', [CatController::class, 'show']);

});

Route::group(['prefix' => 'articles'], function () {
    Route::get('/', [ArticleController::class, 'index']);
    //Route::post('/', [CatController::class, 'store'])->middleware('auth:api');
    Route::post('/', [ArticleController::class, 'store']);
    Route::get('/{id}', [ArticleController::class, 'show']) ;

});

Route::group(['prefix' => 'reviews'], function () {
    Route::get('/', [ReviewController::class, 'index']);
    //Route::post('/', [ReviewController::class, 'store'])->middleware('auth:api');
    Route::post('/', [ReviewController::class, 'store']);
    Route::get('/{id}', [ReviewController::class, 'show']);

});
