<?php

namespace App\Http\Controllers;

use App\Models\MatchResult;
use App\Models\Player;
use App\Models\Score;
use App\Models\Team;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;


class DashboardMatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.matchs.index',[
            'matchs' => MatchResult::all(),
            'scores'=> Score::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.matchs.create',[
            'players' => Player::all(),
            'matchs'=>MatchResult::all()
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
            'player_id' => 'required',
            'match_id' => 'required',
            'goal_minute' => 'required',
            

        ]);

        // if($request->file('image')){
        //     $validatedData['image'] = $request->file('image')->store('post-images');
        // };

        // $validatedData['user_id'] = auth()->user()->id;
     

        Score::create($validatedData); 
        return redirect('/dashboard/matchs')->with('success','New Player has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //
        return view('dashboard.players.show',[
            'player' => $player
        ]);
        ddd($player,'player');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        //
        return view('dashboard.players.edit', [
            'player' => $player,
            'teams' => Team::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        $rules =([
            'name' => 'required|max:255',
            'team_id' => 'required',
            'height' => 'required|max:100',
            'weight' => 'required|max:100',
            'position' => 'required|max:100',
            'number' => 'required|max:100',

        ]);

        

        if($request->slug != $player->slug){
        $rules['slug'] = 'required|unique:players';
        }

        $validatedData = $request->validate($rules);

      
        $validatedData['user_id'] = auth()->user()->id;
      
        Player::where('id', $player->id)
        ->update($validatedData); 
        return redirect('/dashboard/players')->with('success','Player has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        Player::destroy($player->id); 
        return redirect('/dashboard/players')->with('success','Player has been deleted!');
    }

    public function checkSlug(Request $request)
    {
    //    buat slug otomatis

    // $slug = SlugService::createSlug(Post::class, 'slug', 'My First Post');
        $slug = SlugService::createSlug(Player::class,'slug',$request->name);
        return response()->json(['slug'=>$slug]);

    }
}
