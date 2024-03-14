<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pegawais', function (Blueprint $table) {
            // Hapus kolom iddepertement yang sudah ada
            $table->dropColumn('iddepertement');

            // Tambahkan kolom baru untuk foreign key iddepartement
            $table->foreignId('iddepartement')->constrained('departements');
        });
    }

    public function down()
    {
        Schema::table('pegawais', function (Blueprint $table) {
            // Kembalikan kolom iddepartement yang sudah dihapus
            $table->integer('iddepertement')->after('password');

            // Hapus foreign key constraint
            $table->dropForeign(['iddepartement']);
        });
    }
}
