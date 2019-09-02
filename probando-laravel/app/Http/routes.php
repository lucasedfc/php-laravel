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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/contacto-test', function () {
    return view('contacto');
});

Route::post('/hello', function () {
    return 'Hello Zoquete por POST';
});

/*
Route::match(['get', 'post'], 'contacto', function() {
    return view('contacto');
});
*/
Route::any('test-methods', function() {
    return 'This works in all http methods';
});

//Parametros
Route::get('/contacto/{name?}/{age?}', function ($name = "Lucas",
$age = null) {
    /*
    return view('contacto', array(
        "name" => $name,
        "age" => $age
    ));
    */
    return view('contacto.contacto')
    ->with('name', $name)
    ->with('age', $age)
    ->with('fruits', array('naranja', 'mandarina', 'banana', 'pera'));
})->where([ //Validacion de formato
    'name' => '[A-Za-z]+',
    'age' => '[0-9]+'
]);


Route::get('/fruits', 'FruitsController@index');