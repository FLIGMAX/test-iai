<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFakturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fakturas', function (Blueprint $table) {
            $table->id();
            $table->json('dane')->nullabel();
            $table->json('sprzedawca')->nullabel();
            $table->json('nabywca')->nullabel();
            $table->json('pozycje')->nullabel();
            $table->integer('user_id');
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
        Schema::dropIfExists('fakturas');
    }
}
