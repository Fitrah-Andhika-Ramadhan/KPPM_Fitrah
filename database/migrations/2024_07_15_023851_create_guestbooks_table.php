<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('guestbooks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nomor_telepon');
            $table->string('email');
            $table->string('nama_perusahaan');
            $table->string('alamat_perusahaan');
            $table->string('personal_bidang');
            $table->string('tujuan');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guestbooks');
    }
};
