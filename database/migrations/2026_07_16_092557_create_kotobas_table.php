<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kotobas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bab_id');
            $table->string('jepang');
            $table->string('romaji');
            $table->string('arti');
            $table->string('kategori')->nullable();
            $table->integer('urutan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kotobas');
    }
};