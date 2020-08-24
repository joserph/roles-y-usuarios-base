<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\PermissionFolder\Models\Role;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', function(){
    //return 'hola';
    /*return Role::create([
        'name' => 'Admin',
        'slug' => 'admin',
        'description' => 'Administrador',
        'full-access' => 'yes'
    ]);*/

    /*return Role::create([
        'name' => 'Guest',
        'slug' => 'guest',
        'description' => 'Guest',
        'full-access' => 'no'
    ]);*/

    /*return Role::create([
        'name' => 'Test',
        'slug' => 'test',
        'description' => 'Test',
        'full-access' => 'no'
    ]);*/

    $user = User::find(1);
    //$user->roles()->attach([1,3]);
    $user->roles()->sync([1,2]);
    return $user->roles;

});