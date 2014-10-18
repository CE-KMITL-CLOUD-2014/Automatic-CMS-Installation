<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Basic GET Route
/*Route::get('/', function()
{
	return View::make('hello');
});

//Basic GET Route
Route::get('foo/bar', function()
{
	return 'Hello GET foo bar!';
});

//Basic POST Route
Route::post('foo/bar', function()
{
	return 'Hello POST foo bar!';
});

//Registering A Route For Multiple Verbs
Route::match(array('GET', 'POST'), 'get/post', function()
{
	return 'Hello GET & POST';
});

//Registering A Route Responding To Any HTTP Verb
Route::any('foo', function()
{
    return 'Hello any HTTP foo World';
});

//Forcing A Route To Be Served Over HTTPS
Route::get('foos', array('https', function()
{
    return 'foo Must be over HTTPS';
}));

Route::get('user/{id}', function($id)
{
	return 'User page '.$id;
});*/

//Test Database Connection
Route::get('db', function()
{
	return View::make('db');
});


Route::get('/', function()
{
	return View::make('index')->with('pagetitle','Home');
});


## User Route ##
Route::get('/user/register', function()
{
	return View::make('users/register')->with('pagetitle','Register');
});

Route::post('user/register', [
    "as" => "users/register",
    "uses" => "UsersController@registerAction"
]);



