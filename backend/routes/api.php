<?php
use App\Http\Controllers\announcementsController;
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


// i can use just this:

route::resource('announcements', announcementsController::class);

// or i can use this:

// Route::get('/announcements',[announcementsController::class,'index']);
// Route::post('/announcements', [announcementsController::class, 'store']);
route::get('/announcements/search/{type}', [announcementsController::class,'search']);






// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
