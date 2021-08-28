<?php




Route::get('/', function () {
    return view('welcome');
});

Route::get('/notiifications','UserController@notificationSend' )->name('create.notification');
Route::get('/send-proposal-notify','UserController@sendProposalNotify' )->name('sendProposal');


Route::get('/get-all-notification','UserController@get_all_notification' );

Route::get('/markAsRead','UserController@markAsRead' )->name('markAsRead');
Route::get('/markAsUnread','UserController@markAsUnread' )->name('markAsUnread');
Route::get('/notifyDelete','UserController@notifyDelete' )->name('notifyDelete');


Route::get('/notifyAll','UserController@notifyAll' )->name('notifyAll');

Route::post('/singleDelete','UserController@singleDelete' )->name('singleDelete');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
