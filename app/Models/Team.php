<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;



class Team extends Model
{
    use HasFactory;
    use Sluggable;
    use SoftDeletes;

    protected $guarded = ['id'];
    // protected $with = ['schedule'];

    public Function player()
    {
        // satu category bisa untuk banyak post
        return  $this->hasMany(Player::class);
    }

    public Function schedule()
    {
        // satu category bisa untuk banyak post
        return  $this->hasMany(Schedule::class);
    }
    public function getRouteKeyName()
    
    {
        return 'slug';
    }

    // buat slug otomatis
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

//  buat createnya
// Category::create([
//     'name' => "Personal",
//     'slug' => "personal"
// ])