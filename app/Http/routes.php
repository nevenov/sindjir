<?php

Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['web', 'localeSessionRedirect', 'localizationRedirect', 'localize']
], function ()
{
    Route::get('/', 'PagesController@home');
    Route::get(LaravelLocalization::transRoute('routes.about'), 'PagesController@about');
    Route::get(LaravelLocalization::transRoute('routes.accommodation'), 'PagesController@rooms');
	Route::get(LaravelLocalization::transRoute('routes.menuto'), 'PagesController@menuto');
    Route::get(LaravelLocalization::transRoute('routes.gallery'), 'PagesController@gallery');
    Route::get(LaravelLocalization::transRoute('routes.entertainment'), 'PagesController@entertainment');
    Route::get(LaravelLocalization::transRoute('routes.contacts'),
        ['as' => 'contact', 'uses' => 'PagesController@contacts']);
    Route::post('kontakti',
        ['as' => 'contact_store', 'uses' => 'PagesController@store']);
    Route::get(LaravelLocalization::transRoute('routes.prices'),
        ['as' => 'tseni', 'uses' => 'PagesController@prices']);
    Route::post('tseni',
        ['as' => 'reservation_store', 'uses' => 'PagesController@makeReservation']);
    Route::get('obshti-usloviya',
        ['as' => 'terms', 'uses' => 'PagesController@terms']);
});

// Admin area
Route::group(['middleware' => ['web', 'admin']], function () {
    Route::get('/admin', 'AdminController@index');
    Route::get('/admin/reservations', 'AdminController@reservations');
    Route::get('/admin/getReservations', ['as' => 'get_reservations', 'uses' => 'AdminController@getReservations']);
    Route::post('/admin/new-reservation-form', ['as' => 'new_reservation_form', 'uses' => 'AdminController@newReservationForm']);
    Route::post('/admin/make-reservation', ['as' => 'make_reservation', 'uses' => 'AdminController@makeReservation']);
    Route::post('/admin/update-reservation', ['as' => 'update_reservation', 'uses' => 'AdminController@updateReservation']);
    Route::post('/admin/delete-reservation', ['as' => 'delete_reservation', 'uses' => 'AdminController@deleteReservation']);

    // Offers
//    Route::get('admin/offers', 'OfferController@index');
    Route::get('admin/offer/{offer}/confirm', ['as' => 'admin.offer.confirm', 'uses' => 'OfferController@confirm']);
    Route::resource('admin/offer', 'OfferController');

    // Messages
    Route::get('admin/message/{message}/confirm', ['as' => 'admin.message.confirm', 'uses' => 'MessageController@confirm']);
    Route::resource('admin/message', 'MessageController');
});

//Login Routes...
Route::group(['middleware' => ['web']], function () {
    Route::get('/admin/login','AdminAuth\AuthController@showLoginForm');
    Route::post('/admin/login','AdminAuth\AuthController@login');
    Route::get('/admin/logout','AdminAuth\AuthController@logout');
});