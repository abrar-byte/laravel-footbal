<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

 

    // public function player()
    // {
    //     return $this->belongsTo(Player::class);
    // }
    // public function match()
    // {
    //     return $this->belongsTo(MatchResult::class);
    // }

    

}
