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

Route::get('/', ['as' => 'main', 'uses' => 'AppController@index']);


// Route::get('/home', 'AppController@home');


Route::get('/contacto', ['as' => 'contacto', 'uses' => 'HomeController@contact']);


Route::get('/terminos-y-condiciones',
    ['as' => 'terminos', 'uses' => 'HomeController@terminos']);

Route::get('/cocodrilo',
    ['as' => 'cocodrilo', 'uses' => 'HomeController@cocodrilo']);


/**
 * Auth Routs
 */
// OAuth Routes
Route::get('login/{provider}', 'Auth\SocialController@redirectToProvider');
Route::get('login/{provider}/callback',
    'Auth\SocialController@handleProviderCallback');
Route::get('/callback', 'Auth\SocialController@callback');

Route::get('/logout', ['as' => 'logout', 'uses' => 'HomeController@logout']);

Auth::routes();

Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);


// Game
Route::get('/peaton', ['as' => 'game-init', 'uses' => 'HomeController@gameInit']);

// Api
Route::post('/update-progress',
    ['as' => 'update-progress', 'uses' => 'HomeController@updateProgress']);
Route::get('/get-progress',
    ['as' => 'get-progress', 'uses' => 'HomeController@getProgress']);

Route::post('/set-completed',
    ['as' => 'set-completed', 'uses' => 'HomeController@setCompleted']);

Route::post('/update-scene',
    ['as' => 'update-scene', 'uses' => 'HomeController@setScenesStatus']);

Route::get('/get-initial-progress',
    ['as' => 'get-initial-progress', 'uses' => 'HomeController@getInitialProgress']);

Route::get('/login', function() {
    return redirect()->route('main');
});


/**
 * Send Email
 */
Route::post('/enviar-correo',
    ['as' => 'send-email', 'uses' => 'HomeController@sendEmail']);

/**
 * Video progress
 */
Route::post('/update-video-progress',
    ['as' => 'video-progress', 'uses' => 'HomeController@videoProgress']);
