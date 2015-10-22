<?php

//require_once dirname(dirname(__FILE__)).'/vendor/autoload.php';
use Faker\Factory;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function()
{
    return view('pages.home');
 });

Route::get('loremipsum', ['as' => 'loremipsum', 'uses' => 'LoremIpsumController@getcreate']);
Route::post('loremipsum',['as' => 'loremipsum', 'uses' => 'LoremIpsumController@postcreate']);

Route::get('p2', ['as' => 'p2', 'uses' => 'P2Controller@getcreate']);
Route::post('p2',['as' => 'p2', 'uses' => 'P2Controller@postCreate']);

Route::get('randomuser', ['as' => 'randomuser', 'uses' => 'RandomUserController@getcreate']);
Route::post('randomuser',['as' => 'randomuser', 'uses' => 'RandomUserController@postcreate']);
