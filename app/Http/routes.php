<?php

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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function()
{
  Route::get('/', 'AdminHomeController@index');
});


Route::any('user/{name}', function(){
	//使用正则表达式限制参数
   // dd([1, 2, 3]);
    dd('aa');
	return "any";
})->where('name', '[A-Za-z]+');;

Route::get('user/abc', function()
{

       return "abc";
});
Route::get('user/{letter}', function($letter)
{
    // 只有 {letter} 是字母才被调用。
    return $letter;
});
Route::get('user/{id}', function($id)
{
    // 只有 {id} 是数字才被调用。
    return $id;
});
Route::group(['domain' => '{account}.lara.com'], function()
{

    Route::get('user/{id}', function($account, $id)
    {
        //
        return "linode";
    });

});
Route::any('/{letter}','WelcomeController@index');