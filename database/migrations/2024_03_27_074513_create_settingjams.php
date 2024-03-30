<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingjams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settingjams', function (Blueprint $table) {
            $table->id();
            $table->string('namasetting');
            $table->string('jammasukawal');
            $table->string('jammasukakhir');
            $table->string('jamkeluarawal');
            $table->string('jamkeluarakhir');
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
        Schema::dropIfExists('settingjams');
    }
}
