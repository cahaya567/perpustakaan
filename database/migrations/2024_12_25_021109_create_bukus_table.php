<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukusTable extends Migration
{
    public function up()
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT
            $table->string('nama');
            $table->enum('jenis_pengguna', ['siswa', 'dosen']);
            $table->string('alamat')->nullable();
            $table->string('no_telepon', 20)->nullable();
            $table->timestamps();
        });        
    }

    public function down()
    {
        Schema::dropIfExists('buku');
    }
}
