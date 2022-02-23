<?php

// use App\Models\Post;
// use App\Models\User;
// ditulis ya kita ngambil dari mana modelnya
// use App\Models\Post;

use App\Http\Controllers\AdminGameController;
use App\Http\Controllers\AdminTeamController;
use App\Http\Controllers\DashboardPlayerController;
use App\Http\Controllers\DashboardScheduleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\RegisterController;
use App\Models\Player;
use App\Models\Schedule;
use App\Models\Team;

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
    
    return view('home',[
        "title" => "Home",
        "active" => 'home'
    ]);
  
});

Route::get('/about', function () {
    return view('about',
  
    [
"title" => "About",
"active" => "about",
"name" => "Usamah Hafidz",
"status" => "Joki sampe Mythic",
"gambar" => "usamah.jpg"

]
    );
  
});



Route::get('/blog',[PostController::class, 'index']); 

Route::get('/players',[PlayerController::class, 'index']); 
Route::get('/games',[GameController::class, 'index']); 







Route::get('/schedules', function(){
    return view('/schedules',[
        'title' =>'Schedules',
    'active' => 'schedules',
        'schedules' =>Schedule::all()
    ]);
});


Route::get('/teams', function(){
    return view('/teams',[
        'title' =>'Teams',
    'active' => 'teams',
        'teams' =>Team::all()
    ]);
});


Route:: get('/players/{player:slug}',[PlayerController::class, 'show'] );





Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);



Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store']);




Route::get('/dashboard', function() {
   return view('dashboard.index'); 
})->middleware('auth');

Route::resource('/dashboard/players', DashboardPlayerController::class)->middleware('admin');

Route::resource('/dashboard/teams', AdminTeamController::class)->middleware('admin');

Route::resource('/dashboard/schedules', DashboardScheduleController::class)->middleware('admin');

Route::resource('/dashboard/games', AdminGameController::class)->middleware('admin');

Route::get('/dashboard/team/checkSlug',[AdminTeamController::class,'checkSlug'])->middleware('admin');

Route::get('/dashboard/player/checkSlug',[DashboardPlayerController::class,'checkSlug'])->middleware('admin');





