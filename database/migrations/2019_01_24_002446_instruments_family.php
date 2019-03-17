<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InstrumentsFamily extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instruments_family', function (Blueprint $table) {
            $table->increments('id');
            $table->string('family')->unique();
           # $table->timestamps();
        });

        DB::table('instruments_family')->insert([
            'family' => "Brass"
        ]);

        DB::table('instruments_family')->insert([
            'family' => "Persussion"
        ]);

        DB::table('instruments_family')->insert([
            'family' => "Strings"
        ]);

        DB::table('instruments_family')->insert([
            'family' => "Woodwind"
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instruments_family');
    }
}
