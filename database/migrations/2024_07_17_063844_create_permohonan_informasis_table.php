<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanInformasisTable extends Migration
{
    public function up()
    {
        Schema::create('permohonan_informasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('no_ktp');
            $table->string('no_hp');
            $table->text('alamat');
            $table->string('nama_informasi');
            $table->string('tujuan');
            $table->string('upload_ktp')->nullable();
            $table->enum('cara_mendapatkan', ['lihat/baca/dengar/catat', 'mendapatkan salinan informasi']);
            $table->enum('cara_memberikan', ['mengambil langsung', 'email', 'faksimili', 'dikirim']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('permohonan_informasis');
    }
}
