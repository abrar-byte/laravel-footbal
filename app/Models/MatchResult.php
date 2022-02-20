<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchResult extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['schedule'];


    public function scopeFilter($query, array $filters)
    {
        

         $query->when($filters['schedule'] ?? false, function($query, $schedule){
             return $query->whereHas('schedule', function($query) use ($schedule){
                 $query->where('id',$schedule);
             }); 
         });

     
    }


    public function player()
    {
    	return $this->belongsToMany(Player::class);
    }
   

         public function schedule()
    {
        // satu category bisa untuk banyak post
        return $this->belongsTo(Schedule::class);
    }
    // public function score()
    // {
    //     // satu category bisa untuk banyak post
    //     return $this->hasMany(Score::class);
    // }


}
