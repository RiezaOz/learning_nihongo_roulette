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
            $table->foreignId('nilai_id')->constrained()->onDelete('cascade');
            $table->string('jepang');
            $table->string('romaji');
            $table->string('arti');
            $table->string('jawaban')->nullable();
            $table->string('poin'); // A, B, C, 0
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