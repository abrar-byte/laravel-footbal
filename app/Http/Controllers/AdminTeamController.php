<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Player;
use Illuminate\Support\Facades\Storage;


class AdminTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('admin');

        return view('dashboard.teams.index',   [
            'teams' => Team::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.teams.create',[
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
        // ddd($request);
        // return $request->file('image')->store('post-images');
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:teams',
             'image' => 'image|file|max:1024',
            'year' => 'required|max:2022',
            'address' => 'required|max:100',
            'city' => 'required|max:100',
            

        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-images');
        };

        // $validatedData['user_id'] = auth()->user()->id;
     

        Team::create($validatedData); 
        return redirect('/dashboard/teams')->with('success','New Team has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
        return view('dashboard.teams.show',[
            'team' => $team
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
        return view('dashboard.teams.edit', [
            'team' => $team,
            'Players' => Player::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $rules =([
            'name' => 'required|max:255',
            
            'image' => 'image|file|max:1024',
            'year' => 'required|max:2022',
            'address' => 'required|max:100',
            'city' => 'required|max:100',

        ]);

        

        if($request->slug != $team->slug){
        $rules['slug'] = 'required|unique:teams';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($team->image){
                Storage::delete($team->image);
                };
            $validatedData['image'] = $request->file('image')->store('post-images');
        };

      
        // $validatedData['user_id'] = auth()->user()->id;
      
        Team::where('id', $team->id)
        ->update($validatedData); 
        return redirect('/dashboard/teams')->with('success','Team has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team= Team::findOrFail($id);
        $team->delete();
        // Team::destroy($team->id); 
        return redirect('/dashboard/teams')->with('success','Team has been deleted!');
    }

    public function checkSlug(Request $request)
    {
    //    buat slug otomatis
    

    // $slug = SlugService::createSlug(Post::class, 'slug', 'My First Post');
        $slug = SlugService::createSlug(Team::class,'slug',$request->name);
        return response()->json(['slug'=>$slug]);

    }
}
