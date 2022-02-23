<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GamePlayer;
use App\Models\Player;
use App\Models\Schedule;
use Illuminate\Http\Request;

class DashboardGameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.games.index',[
            'games' => Game::get(),
            'gamePlayers'=>GamePlayer::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.games.create',[
            'games' => Game::all(),
            'players' => Player::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'game_id' => 'required',
            'player_id' => 'required',
            'goal_minute' => 'required'
            
        ]);
  

        GamePlayer::create($validatedData); 
        return redirect('/dashboard/games')->with('success','New Player has been added');
    

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(GamePlayer $gamePlayer)
    {
        //
        return view('dashboard.games.edit', [
            'gamePlayer' => $gamePlayer,
            'games' => Game::all(),
            'players' => Player::all(),

        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GamePlayer $gamePlayer)
    {
        //
        $rules =([
            'game_id' => 'required',
            'player_id' => 'required',
            'goal_minute' => 'required'
            
        ]);

        

       

        $validatedData = $request->validate($rules);

      
        // $validatedData['user_id'] = auth()->user()->id;
      
        GamePlayer::where('id', $gamePlayer->id)
        ->update($validatedData); 
        return redirect('/dashboard/games')->with('success','Schedule has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GamePlayer $gamePlayer)
    {
        //
        GamePlayer::destroy($gamePlayer->id); 
        return redirect('/dashboard/games')->with('success','Games has been deleted!');
    }
}
