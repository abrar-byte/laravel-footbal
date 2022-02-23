<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Models\Player;
use App\Models\Team;

class PlayerController extends Controller
{
    public function index(){
   
        $title='';
        if(request('team')){
            $team = Team::firstWhere('slug',request('team'));
            $title = ' in ' . $team->name;
        }
       

        return view ('players',
        [
            "title" => "All players"  .  $title,
            "active" => 'players',
            
        
            "players" => Player::latest()->filter(request(['search','team']))->paginate(7)->withQueryString()

        ]);
    }

  
    public function show (Player $player){
        return view ('player',
        [
            "title" => "Single player",
            "active" => 'players',

            "player" => $player
        ]);
    }
}
