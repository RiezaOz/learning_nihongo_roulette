<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bab_id');
            $table->integer('total_kata');
            $table->integer('poin_a');
            $table->integer('poin_b');
            $table->integer('poin_c');
            $table->integer('nilai');
            $table->string('level');
            $table->integer('tab');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nilais');
    }
};