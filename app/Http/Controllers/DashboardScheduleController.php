<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Player;
use App\Models\Schedule;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;


class DashboardScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.schedules.index',[
            'schedules' => Schedule::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.schedules.create',[
            'teams' => Team::all()
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
            'home_team_id' => 'required',
            'away_team_id' => 'required',
            'tanggal' => 'required|after:yesterday',
            'waktu' => 'required'
            
        ]);
        
    if($validatedData['home_team_id'] === $validatedData['away_team_id']){
        return abort(403,'Team tidak boleh sama');
    }
        // if($request->file('image')){
        //     $validatedData['image'] = $request->file('image')->store('post-images');
        // };

        // $validatedData['user_id'] = auth()->user()->id;
        $fakeId= Schedule::latest('id')->first();


     
        Game::create(['schedule_id' => $fakeId->id + 1]);
        Schedule::create($validatedData); 
        return redirect('/dashboard/schedules')->with('success','New Schedule has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $player
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Player  $player
    //  * @return \Illuminate\Http\Response
    //  */
    public function edit(Schedule $schedule)
    {
        //
        return view('dashboard.schedules.edit', [
            'schedule' => $schedule,
            'teams' => Team::all()
        ]);
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Player  $player
    //  * @return \Illuminate\Http\Response
    //  */
    public function update(Request $request, Schedule $schedule)
    {
        $rules =([
            'home_team_id' => 'required',
            'away_team_id' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required'
            
        ]);

        

       

        $validatedData = $request->validate($rules);

      
        // $validatedData['user_id'] = auth()->user()->id;
      
        Schedule::where('id', $schedule->id)
        ->update($validatedData); 
        return redirect('/dashboard/schedules')->with('success','Schedule has been updated!');
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Player  $player
    //  * @return \Illuminate\Http\Response
    //  */
    public function destroy($id)
    { 
        
        $schedule= Schedule::findOrFail($id);
        $gameId = Game::findOrFail($id);
        $schedule->delete();
        $gameId->delete();

        // return dd($gameId);
        // Game::destroy($gameId);
        // Schedule::destroy($schedule->id); 
        return redirect('/dashboard/schedules')->with('success','Schedule has been deleted!');
    }

    
}
