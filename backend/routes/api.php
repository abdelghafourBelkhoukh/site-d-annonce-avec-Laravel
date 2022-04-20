<?php
use App\Http\Controllers\announcementsController;
use App\Http\Controllers\AuthController;
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

// route::resource('announcements', announcementsController::class);


    // public routes
    Route::get('/announcements',[announcementsController::class,'index']);
    Route::get('/announcements/{id}',[announcementsController::class,'show']);
    Route::get('/announcements/search/{type}', [announcementsController::class,'search']);
    Route::post('/register',[AuthController::class,'register']);
    Route::post('/login',[AuthController::class,'login']);

    // protected routes
    Route::group(['middleware' => ['auth:sanctum']] , function () {
        Route::post('/announcements', [announcementsController::class, 'store']);
        Route::put('/announcements/{id}',[announcementsController::class,'update']);
        Route::delete('/announcements/{id}',[announcementsController::class,'destroy']);
        Route::post('/logout',[AuthController::class,'logout']);

});








// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
