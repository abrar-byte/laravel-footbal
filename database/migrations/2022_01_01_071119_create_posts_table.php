<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            // cari dari category idnya, untuk relationshipnya
            $table->foreignId('category_id');
            // buat id user untuk relationshipnya
            $table->foreignId('user_id');
            // buat table stringnya
            $table->string('title');
            // buat slug
            $table->string('slug')->unique();
            // buat untuk gambar, cukup text krn filenya disimpen di directory, dibuat boleh kosong
            $table->string('image')->nullable();
            // isian tulisannya pake text biar  bisa banyak
            $table->text('excerpt');
            $table->text('body');
            // tipe data timestamp dan boleh kosong
            $table->timestamp('published_at')->nullable();
            // method untuk created_at dan published_at
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

