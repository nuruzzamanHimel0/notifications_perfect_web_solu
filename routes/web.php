<?php




Route::get('/', function () {
    return view('welcome');
});

Route::get('/notiifications','UserController@notificationSend' );
Route::get('/get-all-notification','UserController@get_all_notification' );
Route::get('/markAsRead','UserController@markAsRead' )->name('markAsRead');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
