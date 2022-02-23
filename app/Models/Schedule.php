<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Schedule extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = ['id'];
    protected $with = ['game','homeTeam', 'awayTeam'];

 

    public function game()
    {
        // satu category bisa untuk banyak post
        return  $this->belongsTo(Game::class);
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
