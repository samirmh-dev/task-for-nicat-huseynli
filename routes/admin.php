<?php


Route::get('/', 'HomeController@index')->name('home');


//routing for auth
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');



// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');



// routing for flights

Route::resource('flights', 'FlightsController');


// routing for hotels

Route::resource('hotels', 'HotelsController');
Route::post('/hotels/upload-image/','HotelsController@uploadImage');
Route::post('/hotels/remove-image','HotelsController@removeImage');


//routing for rooms of hotels

Route::get('hotels/{hotel}/rooms','HotelRoomsController@index');
Route::get('hotels/{hotel}/rooms/create','HotelRoomsController@create');
Route::post('hotels/{hotel}/rooms','HotelRoomsController@store');
Route::get('hotels/{hotel}/rooms/{room}/edit','HotelRoomsController@edit');
Route::patch('hotels/{hotel}/rooms/{room}','HotelRoomsController@update');
Route::get('hotels/{hotel}/rooms/{room}','HotelRoomsController@show');
Route::delete('hotels/{hotel}/rooms/{room}','HotelRoomsController@destroy');

