<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMatchResultPlayerRequest;
use App\Http\Requests\UpdateMatchResultPlayerRequest;
use App\Models\MatchResultPlayer;

class MatchResultPlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMatchResultPlayerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMatchResultPlayerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MatchResultPlayer  $matchResultPlayer
     * @return \Illuminate\Http\Response
     */
    public function show(MatchResultPlayer $matchResultPlayer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MatchResultPlayer  $matchResultPlayer
     * @return \Illuminate\Http\Response
     */
    public function edit(MatchResultPlayer $matchResultPlayer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMatchResultPlayerRequest  $request
     * @param  \App\Models\MatchResultPlayer  $matchResultPlayer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMatchResultPlayerRequest $request, MatchResultPlayer $matchResultPlayer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MatchResultPlayer  $matchResultPlayer
     * @return \Illuminate\Http\Response
     */
    public function destroy(MatchResultPlayer $matchResultPlayer)
    {
        //
    }
}
