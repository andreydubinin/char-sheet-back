<?php

use App\Http\Controllers\Api\CharsheetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::group([
    'middleware' => 'api',
    'prefix'     => 'auth',
], function ($router) {
    Route::post('login', 'Api\AuthController@login');
    Route::post('registration', 'Api\AuthController@registration');
    Route::get('logout', 'Api\AuthController@logout');
    Route::get('refresh', 'Api\AuthController@refresh');
    Route::get('me', 'Api\AuthController@me');
});

Route::resource('charsheets', 'Api\CharsheetController')->middleware(['api', 'jwt.auth']);
Route::post('charsheets/set-characteristic/{charsheet}', 'Api\CharsheetController@setCharacteristic')->middleware(['api', 'jwt.auth']);

Route::group([
    'middleware' => ['api', 'jwt.auth'],
    'prefix' => 'characteristics'
], function ($router) {
    Route::get('', 'Api\CharacteristicController@index');
    Route::get('get-for-charsheet/{charsheet}', 'Api\CharacteristicController@getForCharsheet');
});
