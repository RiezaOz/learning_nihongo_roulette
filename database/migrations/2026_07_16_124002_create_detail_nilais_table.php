<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detail_nilais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nilai_id');
            $table->string('jepang');
            $table->string('kanji')->nullable();
            $table->string('romaji');
            $table->string('arti');
            $table->string('jawaban')->nullable();
            $table->string('poin');
            $table->boolean('benar')->default(true);
            $table->float('waktu')->default(0);
            $table->integer('urutan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_nilais');
    }
};