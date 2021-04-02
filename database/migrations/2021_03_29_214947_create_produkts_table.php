<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduktsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produkts', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa');
            $table->decimal('netto', 8, 2)->default(0);
            $table->string('vat')->default(0);
            $table->decimal('brutto', 8, 2)->default(0);
            $table->string('waluta_id')->default(0);
            $table->string('pkwiu')->nullable();
            $table->string('jm')->default("szt.");
            $table->integer('rodzaj')->default(0);
            $table->integer('usluga')->default(0);
            $table->integer('symbol_gtu')->default(0);
            $table->string('kod_produktu')->nullable();
            $table->string('kod_kreskowy')->nullable();
            $table->longText('opis')->nullable();
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
        Schema::dropIfExists('produkts');
    }
}
