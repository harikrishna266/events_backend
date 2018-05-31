<?php

use Illuminate\Http\Request;

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
use App\Http\Resources\Users as UserResource;
use \App\Http\Resources\Category as CategoryResource;
use \App\Http\Resources\Event as EventRe;

use App\User;
use \App\models\Category;
use App\models\Event;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/events', function () {
    return new EventRe(Event::all());   
});

Route::get('/categories', function () {
    return new CategoryResource(Category::all());
});
Route::middleware('auth:api')->group(function () {
    Route::post('/update-user-categories', 'UserCategoryController@addUserCatgories');
    Route::get('/get-user-event-by-category', 'EventController@getUserEventsByCategory');
});
