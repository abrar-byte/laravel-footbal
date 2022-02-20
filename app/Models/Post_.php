<?php

namespace App\Models;

// yang bawah ini belum butuh untuk nyambung di databese
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Post extends Model
// {
//     use HasFactory;
// }

class Post {
    // datanya statis aksesnya private
    private static $blog_posts=[
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Usamah Hafidz",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi, mollitia quod saepe laudantium inventore quaerat enim deserunt officia, neque illum odit veritatis iusto et? Quam doloribus ipsa odit error enim at veniam incidunt, corporis assumenda molestiae deleniti! Suscipit iusto tempore asperiores accusamus exercitationem temporibus corrupti cumque fugiat fuga praesentium voluptates aperiam earum consequuntur placeat, nostrum vel nisi dicta quas corporis eum sit neque, magni quaerat. Cum velit expedita architecto, assumenda error pariatur, qui sint commodi, voluptates nemo est nam non."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Falcon Sang Penjoki",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos necessitatibus, quo facere nulla hic odit facilis eligendi amet, iste cum, modi fuga accusamus laborum. Natus quas non sequi at optio inventore debitis aspernatur, eius maxime dignissimos, ipsa sapiente reprehenderit dolor minima, quidem praesentium voluptates voluptas saepe. Soluta officiis, reprehenderit molestias sed esse, voluptatibus beatae tempora fuga fugit, quod ab ex voluptatum cum exercitationem odio placeat? Deserunt est numquam molestiae qui doloremque aliquid soluta officiis eligendi ipsa suscipit rem, repudiandae assumenda facilis hic magnam, quisquam accusantium praesentium quod laborum dicta minima! Nesciunt sequi excepturi deserunt, tempore assumenda nihil dolores ex ea."
        ]
        ];

        public static function all()
        {
            // return $this->$blog_posts;
            // karena static maka pakenya self
            // return self::$blog_posts;

            // pake collection supaya array bisa dimanipulatif
            return collect(self::$blog_posts);

        }

        public static function find($slug){
            // ambil dulu semua postnya dari blogposts
            // $posts = self::$blog_posts;

            // karena sudah pake collect maka cukup begini dgn mengambil array static
            $posts = static::all();

            // kalau slugnya sama dengan slug yg dikirim ke parameter maka masukkan ke $post
            // $post=[];
            // foreach($posts as $p){
            //     if($p["slug"] === $slug){
            //         $post=$p;
            //     }
            // }

            // return $post;

            // dengan menggunakan collection, tampilkan data di mana data 'firstWhere' yg pertama kali ditemukan slugnya sama dengan $slug parameter yg diklik
            return $posts->firstWhere('slug',$slug);
        }
}