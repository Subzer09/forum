<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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

Auth::routes();

Route::get('/','ForumsController@index');
Route::get('/forums/{forum}', 'ForumsController@show');
Route::get('/posts/{post}', 'PostsController@show');
Route::post('/forums', 'ForumsController@store');
Route::post('/posts', 'PostsController@store');
Route::post('replies', 'RepliesController@store');

/*
 * RUTA PARA OBTENER LAS IMAGENES*/
Route::get('/images/{path}/{attachment}', function($path, $attachment){
    $storagePath = Storage::disk($path)->getDriver()->getAdapter()->getPathPrefix();
    $imageFilePath = $storagePath . $attachment;
    if(File::exists($imageFilePath)){
        return Image::make($imageFilePath)->response();
    }
});
