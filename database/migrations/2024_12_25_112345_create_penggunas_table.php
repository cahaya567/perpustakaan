<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunasTable extends Migration
{
    public function up()
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id('id_pengguna');
            $table->string('nama');
            $table->enum('jenis_pengguna', ['siswa', 'dosen']);
            $table->string('alamat')->nullable();
            $table->string('no_telepon', 20)->nullable();
            $table->timestamps(); // Untuk created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengguna');
    }
}
