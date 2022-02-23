<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Game extends Model
{
    use HasFactory;
    use SoftDeletes;
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
    	return $this->belongsToMany(Player::class)->withPivot(['goal_minute']);
    }

    public function schedule()
    {
        // satu category bisa untuk banyak post
        return $this->belongsTo(Schedule::class);
    }
}
