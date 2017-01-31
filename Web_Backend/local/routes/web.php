<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', ['as' => 'getLogin', 'uses' => 'backend\AuccountController@getLogin']);
Route::get('admin', ['as' => 'getLogin', 'uses' => 'backend\AuccountController@getLogin']);
Route::post('admin', ['as' => 'postLogin', 'uses' => 'backend\AuccountController@postLogin']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('manager', ['as' => 'getMain', 'uses' => 'backend\MainController@getMain']);

    Route::get('manager.price', ['as' => 'getPrice', 'uses' => 'backend\PriceServiceController@getPrice']);
    Route::post('manager/price/post', ['as' => 'postCreatePrice', 'uses' => 'backend\PriceServiceController@postCreatePrice']);
    Route::get('manager/price/viewdata', ['as' => 'getViewData', 'uses' => 'backend\PriceServiceController@getViewData']);
    Route::post('manager/price/remove', ['as' => 'postRemovePrice', 'uses' => 'backend\PriceServiceController@postRemovePrice']);

    Route::get('manager.service', ['as' => 'getService', 'uses' => 'backend\PriceServiceController@getService']);
    Route::get('manager/service/viewdata', ['as' => 'getViewService', 'uses' => 'backend\PriceServiceController@getViewService']);
    Route::post('manager/service/post', ['as' => 'postCreateService', 'uses' => 'backend\PriceServiceController@postCreateService']);
    Route::post('manager/service/remove', ['as' => 'postRemoveService', 'uses' => 'backend\PriceServiceController@postRemoveService']);

    Route::get('manager.slide', ['as' => 'getSlide', 'uses' => 'backend\MainController@getSlide']);
    Route::post('manager/slide/post', ['as' => 'postSlide', 'uses' => 'backend\MainController@postSlide']);
    Route::get('manager/slide/viewdata', ['as' => 'getViewSlide', 'uses' => 'backend\MainController@getViewSlide']);
    Route::post('manager/slide/remove', ['as' => 'postRemoveSlide', 'uses' => 'backend\MainController@postRemoveSlide']);

    Route::get('manager.album', ['as' => 'getAlbum', 'uses' => 'backend\AlbumController@getAlbum']);
    Route::post('manager/album/post', ['as' => 'postAlbum', 'uses' => 'backend\AlbumController@postAlbum']);
    Route::get('manager/album/viewdata', ['as' => 'getViewAlbum', 'uses' => 'backend\AlbumController@getViewAlbum']);
    Route::post('manager/album/remove', ['as' => 'postRemoveAlbum', 'uses' => 'backend\AlbumController@postRemoveAlbum']);
    Route::get('manager.albumview{id?}', ['as' => 'getAlbumView', 'uses' => 'backend\AlbumController@getAlbumView']);
    Route::post('manager/album/image', ['as' => 'postImageAlbum', 'uses' => 'backend\AlbumController@postImageAlbum']);
    Route::post('manager/album/albumimage', ['as' => 'postAlbumImage', 'uses' => 'backend\AlbumController@postAlbumImage']);
    Route::get('manager/albumimage/viewdata/{id}', ['as' => 'getAlbumImage', 'uses' => 'backend\AlbumController@getAlbumImage']);
    Route::post('manager/albumimage/remove', ['as' => 'postRemoveImage', 'uses' => 'backend\AlbumController@postRemoveImage']);

    Route::get('manager.contact', ['as' => 'getContact', 'uses' => 'backend\ContactController@getContact']);
    Route::post('manager/contact/post', ['as' => 'postContact', 'uses' => 'backend\ContactController@postContact']);
    Route::get('manager/contact/fromdata', ['as' => 'getFromData', 'uses' => 'backend\ContactController@getFromData']);

    Route::get('manager.house', ['as' => 'getHouse', 'uses' => 'backend\HouseController@getHouse']);
    Route::post('manager/house/post', ['as' => 'postHouse', 'uses' => 'backend\HouseController@postHouse']);
    Route::get('manager/house/viewdata', ['as' => 'ViewHouse', 'uses' => 'backend\HouseController@ViewHouse']);
    Route::post('manager/house/remove', ['as' => 'postRemoveHouse', 'uses' => 'backend\HouseController@postRemoveHouse']);
    Route::get('manager.houseview{id?}', ['as' => 'getHouseView', 'uses' => 'backend\HouseController@getHouseView']);
    Route::post('manager/house/image', ['as' => 'postAddHouseImage', 'uses' => 'backend\HouseController@postAddHouseImage']);
    Route::get('manager/house/viewdata/{id}', ['as' => 'getHouseImage', 'uses' => 'backend\HouseController@getHouseImage']);
    Route::post('manager/houseview/remove', ['as' => 'postHouseImage', 'uses' => 'backend\HouseController@postHouseImage']);

    Route::get('manager.gallery', ['as' => 'getGallery', 'uses' => 'backend\GalleryController@getGallery']);
    Route::post('manager/gallery/post', ['as' => 'postAddGallery', 'uses' => 'backend\GalleryController@postAddGallery']);
    Route::get('manager/gallery/viewdata', ['as' => 'getViewGallery', 'uses' => 'backend\GalleryController@getViewGallery']);
    Route::post('manager/gallery/remove', ['as' => 'postRemoveGallery', 'uses' => 'backend\GalleryController@postRemoveGallery']);

    Route::get('manager.event', ['as' => 'getEvent', 'uses' => 'backend\EventController@getEvent']);
    Route::post('manager/event/post', ['as' => 'postAddEvent', 'uses' => 'backend\EventController@postAddEvent']);
    Route::get('manager/event/viewdata', ['as' => 'getViewEvent', 'uses' => 'backend\EventController@getViewEvent']);
    Route::post('manager/event/remove', ['as' => 'postRemoveEvent', 'uses' => 'backend\EventController@postRemoveEvent']);
    Route::post('manager/eventtext/post', ['as' => 'postEventText', 'uses' => 'backend\EventController@postEventText']);

    Route::get('logout', ['as' => 'getLogout', 'uses' => 'backend\AuccountController@logout']);

});
