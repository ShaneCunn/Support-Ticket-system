<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout'); //Just added to fix issue
// routes.php file

Route::get('new_ticket', 'TicketsController@create');
Route::post('new_ticket', 'TicketsController@store');

Route::get('my_tickets', 'TicketsController@userTickets');
Route::get('tickets/{ticket_id}', 'TicketsController@show');

Route::post('comment', 'CommentsController@postComment');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('tickets', 'TicketsController@index');
    Route::post('close_ticket/{ticket_id}', 'TicketsController@close');
    Route::post('open_ticket/{ticket_id}', 'TicketsController@open');
});



Route::get('/home', 'HomeController@index')->name('home');
// file route
Route::get('/file', function () {

    return view('file');
});

Route::post('avatars', function () {

    request()->file('avatar')->store('avatars');
    return back();

});
// image upload
Route::get('image-upload',['as'=>'image.upload','uses'=>'ImageUploadController@imageUpload']);

Route::post('image-upload',['as'=>'image.upload.post','uses'=>'ImageUploadController@imageUploadPost']);


// multiple file uploads using DropZone js

Route::get('dropzoneFileUpload','DropzoneController@dropzoneFileUpload') ;

Route::post('dropzoneFileUpload',array('as'=>'dropzone.fileupload','uses'=>'DropzoneController@dropzoneFileUploadPost')) ;

Route::get('/table', 'APIController@table')->name('table');
//Route::get('/ajax', 'APIController@ajax')->name('ajax');


Route::get('/datatables', 'DatatablesController@getIndex')->name('datatables');

Route::get('datatables.data', 'DatatablesController@anyData')->name('datatables.data');

/*Route::controller('datatables', 'DatatablesController', [
    'anyData'  => 'datatables.data',
    'getIndex' => 'datatables',
]);*/