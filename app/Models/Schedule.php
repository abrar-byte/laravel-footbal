<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['match','homeTeam', 'awayTeam'];

 

    public function match()
    {
        // satu category bisa untuk banyak post
        return  $this->belongsTo(MatchResult::class);
    }

    public function homeTeam()
    {
        return $this->belongsTo(Team::class,'home_team_id');
        
    }
    public function awayTeam()
    {
        return $this->belongsTo(Team::class,'away_team_id');
        
    }

}
