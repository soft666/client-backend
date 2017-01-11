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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('slide', 'backend\MainController@JsonSlide');

Route::get('price', 'api\PriceServiceController@priceApi');
Route::get('services', 'api\PriceServiceController@serviceApi');

Route::get('album', 'api\AlbumController@AlbumApi');
Route::get('viewalbum/{id}', 'api\AlbumController@ViewAlbumApi');
Route::get('viewalbumname/{id}', 'api\AlbumController@ViewAlbumNameApi');

Route::get('maps', 'api\ContactController@MapsApi');

Route::get('house', 'api\HouseController@HouseApi');
Route::get('viewhouse/{id}', 'api\HouseController@ViewHouseApi');
Route::get('viewhousename/{id}', 'api\HouseController@ViewHouseNameApi');

Route::get('viewgallery', 'api\AlbumController@ViewGalleryApi');
Route::get('viewevent', 'api\AlbumController@ViewEventApi');

Route::get('vieweventtext', 'api\AlbumController@ViewEventTextApi');
