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

//Test Database Connection
/*Route::get('db', function()
{
	return View::make('db');
});*/

Route::get('/', function()
{
    return View::make('index')->with('pagetitle','Home');
});

## User Route ##
Route::get('user/delete/{uid}', 'UsersController@deleteAction');
Route::get('user/ban/{uid}', 'UsersController@banAction');
Route::get('user/unban/{uid}', 'UsersController@unbanAction');

Route::get('user/register', function()
{   
    if (Auth::check()) {
        return Redirect::to('site/manage');
    } else {
         return View::make('users/register')->with('pagetitle','Register');
    }
});

Route::post('user/register', [
    "before" => "csrf",
    "as" => "users/register",
    "uses" => "UsersController@registerAction"
]);

Route::get('user/login', function()
{
    if (Auth::check()) {
        return Redirect::to('site/manage');
    } else {
        return View::make('users/login')->with('pagetitle','Login');
    }
});

Route::post('user/login', [
    "before" => "csrf",
    "as" => "users/login",
    "uses" => "UsersController@loginAction"
]);

Route::any('user/logout', [
    "as" => "users/logout",
    "uses" => "UsersController@logoutAction"
]);

Route::get('dashboard', function()
{
    if (Auth::check()) {
        return View::make('dashboard')->with('pagetitle','Dashboard');
    } else {
        return Redirect::to('user/login');
    }
});

Route::get('user/confirm/{confirm_code}', [
    "as" => "users/confirm",
    "uses" => "UsersController@confirmAction"
]);

Route::get('user/confirm', function()
{
    return View::make('users/confirm')->with('pagetitle','Account Confirmation');
});

Route::get('user/profile', function()
{
    if (Auth::check()) {
        return View::make('users/profile')->with('pagetitle','Profile');
    } else {
        return Redirect::to('user/login');
    }
});


## Password ##
Route::post('password/change', [
    "before" => "csrf",
    "as" => "users/profile",
    "uses" => "PasswordController@change"
]);
	
Route::get('password/forget', function()
{
    if (Auth::check()) {
        return Redirect::to('site/manage');
    } else {
        return View::make('password/forget')->with('pagetitle','Forget Password');
    }
});

Route::post('password/forget', [
    "before" => "csrf",
    "as" => "password/forget",
    "uses" => "PasswordController@forget"
]);

Route::get('password/reset/{token}', function($token=null) {
    if (is_null($token)) App::abort(404);
     if (Auth::check()) {
        return Redirect::to('site/manage');
    } else {
        return View::make('password/reset')->with('pagetitle','Reset Password')->with('token', $token);
    }    
});

Route::post('password/reset/{token}', [
    "before" => "csrf",
    "as" => "password/reset",
    "uses" => "PasswordController@reset"
]);

## Site ##
Route::get('site/delete/{sid}/{mode}', 'SiteController@deleteAction');
Route::get('site/block/{sid}', 'SiteController@blockAction');
Route::get('site/unblock/{sid}', 'SiteController@unblockAction');

Route::get('site/create', function()
{
    if (Auth::check()) {
        $domain = Domain::where('status_active','=',1)->orderBy('did', 'asc')->lists('name','did');
        return View::make('sites/create')->with('pagetitle','Create Website')->with('domain', $domain);
    } else {
        return Redirect::to('/user/login');
    }
});

Route::post('site/create', [
    "before" => "csrf",
    "as" => "sites/create",
    "uses" => "SiteController@createAction"
]);

Route::post('site/check', 'SiteController@checkAvailable');

Route::post('site/install', 'SiteController@installSite');

Route::get('site/manage', 'SiteController@ManageSiteAction');


## Admin ##
Route::get('admin/user', 'AdminController@ShowUserAction');
Route::get('admin/user/{uid}', 'AdminController@ShowUserIDAction');

Route::get('admin/site', 'AdminController@ShowSiteAction');
Route::get('admin/site/{sid}', 'AdminController@ShowSiteIDAction');

Route::get('admin/setting', 'AdminController@ShowSettingAction');
Route::post('admin/setting', 'AdminController@FormSettingAction');

Route::get('admin/domain', 'AdminController@ShowDomainAction');
Route::get('admin/domain/hide/{did}', 'AdminController@HideDomainIDAction');
Route::get('admin/domain/show/{did}', 'AdminController@ShowDomainIDAction');
Route::post('admin/domain/add', [
    "before" => "csrf",
    "uses" => "AdminController@AddAction"
]);

