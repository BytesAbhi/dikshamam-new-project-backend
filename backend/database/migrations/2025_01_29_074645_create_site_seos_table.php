<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSeosTable extends Migration
{
    public function up()
    {
        Schema::create('site_seos', function (Blueprint $table) {
            $table->id();
            $table->string('meta_title');
            $table->text('meta_desc');
            $table->string('meta_keyword');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('site_seos');
    }
}
