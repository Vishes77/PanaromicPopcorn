<?php

use App\Http\Controllers\MovieList;
use App\Http\Controllers\Profile;
use App\Http\Controllers\Search;
use App\Http\Controllers\Users;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\List_;

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
    return view('home');
});

Route::get('search', [Search::class, 'searchquery']);

// Login
Route::view('login', "login");
Route::post('login', [Users::class, 'login']);


//Signup
Route::view('signup', "signup");
Route::post('signup', [Users::class, 'signup']);

//Logout
Route::get('logout', [Users::class, 'logout']);

//Adding to list
Route::post('addtolist', [MovieList::class, 'addtolist']);

//Show List
Route::get("{user}/list", [MovieList::class, 'showList']);

//Profile
Route::get("profile/{user}", [Profile::class, 'profile']);
