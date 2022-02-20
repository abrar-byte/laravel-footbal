<?php

namespace Database\Seeders;

use App\Models\Category;
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

      





        // User::create([
        //     'name' => 'Falcon',
        //     'email' => 'dedekFalcon@gmail.com',
        //     // buat passwordnya pake bcrypt
        //     'password' => bcrypt('32222')
        // ]);

    // Categorynya dibikin tanpa factory aja

        // buat database 2 category dan seterusnya
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
            'height' => "170cm",
            'weight' => '60kg',
            'position' => 'Striker',
            'number' => 10,
            'team_id'=> 1,
            'user_id' => 2       
        ]);

        Player::create([
            'name' => 'Abdul Hanif',
            'slug' => 'abdul-hanif',
            'height' => "165cm",
            'weight' => '50kg',
            'position' => 'Bek',
            'number' => 11,
            'team_id'=> 2,
            'user_id' => 1       
        ]);

        Player::create([
            'name' => 'Cristiano Ahmad',
            'slug' => 'cristiano-ahmad',
            'height' => "188cm",
            'weight' => '90kg',
            'position' => 'Sayap kanan',
            'number' => 5,
            'team_id'=> 3,
            'user_id' => 4       
        ]);

        Schedule::create([
            'home_team_id' => '1',
            'away_team_id' => '2',
            'tanggal'=> \Carbon\Carbon::createFromFormat('d/m/Y', '11/06/1990'),
            'waktu'=> \Carbon\Carbon::createFromFormat('H:i:s', '15:16:17'),

            // 'waktu' =>Carbon::parse('12:00')
        ]);

        Schedule::create([
            'home_team_id' => '3',
            'away_team_id' => '2',
            'tanggal'=> \Carbon\Carbon::createFromFormat('d/m/Y', '11/06/1990'),
            'waktu'=> \Carbon\Carbon::createFromFormat('H:i:s', '15:16:17'),

            // 'waktu' =>Carbon::parse('12:00')
        ]);

        $s=\Carbon\Carbon::createFromFormat('i:s', '15:16')->toTimeString();
        $d=\Carbon\Carbon::createFromFormat('i:s', '17:16')->toTimeString();

        $array_home= array('Usamah');
        $array_away= array('Abdul Hanif', 'Cristiano Ahmad');

        $array_minute_home=array($s,$d);
        

        MatchResult::create([
            
          
            "schedule_id"=>1,


            

            // 'waktu' =>Carbon::parse('12:00')
        ]);

        MatchResult::create([
           
            "schedule_id"=>2,

           
        ]);

        // MatchResultPlayer::create([
        //     "player_id"=>1,
        //     "match_id"=>1,
        //     "goal_minute"=>\Carbon\Carbon::createFromFormat('i:s', '15:16')
        // ]);
        // MatchResultPlayer::create([
        //     "player_id"=>2,
        //     "match_id"=>1,
        //     "goal_minute"=>\Carbon\Carbon::createFromFormat('i:s', '17:16')
        // ]);

        // coba bikin 20 Post
        // Post::factory(20)->create();

        // buat database 2 postingan category_id nya 2 dan 1
        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, doloribus.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse pariatur ea sapiente minima dicta eum nihil enim praesentium ab tempore at officiis aut, maxime sed, earum nesciunt. Magnam minima alias, itaque aliquam nihil, natus vel harum non doloremque debitis at architecto quasi ipsum hic dignissimos qui, eius eaque optio consequatur.',
        //     'category_id' => 2,
        //     'user_id' => 2

        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, doloribus.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse pariatur ea sapiente minima dicta eum nihil enim praesentium ab tempore at officiis aut, maxime sed, earum nesciunt. Magnam minima alias, itaque aliquam nihil, natus vel harum non doloremque debitis at architecto quasi ipsum hic dignissimos qui, eius eaque optio consequatur.',
        //     'category_id' => 1,
        //     'user_id' => 1

        // ]);

        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, doloribus.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse pariatur ea sapiente minima dicta eum nihil enim praesentium ab tempore at officiis aut, maxime sed, earum nesciunt. Magnam minima alias, itaque aliquam nihil, natus vel harum non doloremque debitis at architecto quasi ipsum hic dignissimos qui, eius eaque optio consequatur.',
        //     'category_id' => 1,
        //     'user_id' => 2

        // ]);


    }
}
