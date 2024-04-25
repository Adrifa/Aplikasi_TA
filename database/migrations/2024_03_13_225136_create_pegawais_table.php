<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('namapegawai');
            $table->string('hp');
            $table->text('alamat');
            $table->date('tgllahir');
            $table->string('rfid')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('iddepartement');
            $table->integer('idstatusjabatan');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
}
