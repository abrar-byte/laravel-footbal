<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Game;
use App\Models\GamePlayer;
use App\Models\MatchResult;
use App\Models\MatchResultPlayer;
use App\Models\Player;
use App\Models\Post;
use App\Models\Schedule;
use App\Models\Score;
use App\Models\Team;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        // sekarang bikin user dengan factory
        //buat database untuk usernya
        User::create([
            'name' => 'Usamah Hafidz',
            'username' => 'usamah',
            'email' => 'usamah@gmail.com',
            // buat passwordnya pake bcrypt
            'password' => bcrypt('32018')
        ]);
        
        User::factory(4)->create();

      





        Team::create([
            'name' => 'Solo FC',
            'slug' => 'solo-fc',
            'year' => 2020,
            'address' => "Mangkubumen",
            'city' => "Surakarta"
            
        ]);

        Team::create([
            'name' => 'Jogja FC',
            'slug' => 'jogja-fc',
            'year' => 2021,
            'address' => "Kota Gede",
            'city' => "Yogyakarta"
        ]);

        Team::create([
            'name' => 'Bandung FC',
            'slug' => 'bandung-fc',
            'year' => 2019,
            'address' => "Bumi Api",
            'city' => "Bandung"
        ]);

        Player::create([
            'name' => 'Usamah',
            'slug' => 'usamah',
            'height' => 170,
            'weight' => 60,
            'position' => 'Striker',
            'number' => 10,
            'team_id'=> 1,
            'user_id' => 2       
        ]);

        Player::create([
            'name' => 'Abdul Hanif',
            'slug' => 'abdul-hanif',
            'height' => 165,
            'weight' => 50,
            'position' => 'Bek',
            'number' => 11,
            'team_id'=> 2,
            'user_id' => 1       
        ]);

        Player::create([
            'name' => 'Cristiano Ahmad',
            'slug' => 'cristiano-ahmad',
            'height' => 188,
            'weight' => 90,
            'position' => 'Sayap kanan',
            'number' => 5,
            'team_id'=> 3,
            'user_id' => 4       
        ]);

        Schedule::create([
            'home_team_id' => '1',
            'away_team_id' => '2',
            'tanggal'=> \Carbon\Carbon::createFromFormat('d/m/Y', '11/06/2022'),
            'waktu'=> \Carbon\Carbon::createFromFormat('H:i:s', '15:16:17'),

            // 'waktu' =>Carbon::parse('12:00')
        ]);

        Schedule::create([
            'home_team_id' => '3',
            'away_team_id' => '2',
            'tanggal'=> \Carbon\Carbon::createFromFormat('d/m/Y', '11/07/2022'),
            'waktu'=> \Carbon\Carbon::createFromFormat('H:i:s', '15:16:17'),

            // 'waktu' =>Carbon::parse('12:00')
        ]);

     

        Game::create([
            
          
            "schedule_id"=>1,            

        ]);

        Game::create([
            
          
            "schedule_id"=>2,            

        ]);

      
        GamePlayer::create([
            "player_id"=>1,
            "game_id"=>1,
            "goal_minute"=>'65:16'
        ]);

        GamePlayer::create([
            "player_id"=>1,
            "game_id"=>1,
            "goal_minute"=>'90:16'
        ]);

        GamePlayer::create([
            "player_id"=>2,
            "game_id"=>1,
            "goal_minute"=>'20:16'
        ]);

       

    }
}
