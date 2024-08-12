<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfolioSlidesTable extends Migration
{
    public function up()
    {
        Schema::create('portfolio_slides', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->json('images')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('portfolio_slides');
    }
}
