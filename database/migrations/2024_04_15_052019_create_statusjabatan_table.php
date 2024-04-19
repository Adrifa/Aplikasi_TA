<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusjabatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statusjabatan', function (Blueprint $table) {
            $table->id();
            $table->string('namastatusjabatan');
            $table->integer('gaji');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('statusjabatan');
    }
}
