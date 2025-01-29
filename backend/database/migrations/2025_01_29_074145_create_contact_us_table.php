<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactUsTable extends Migration
{
    public function up()
    {
        Schema::create('contact_us', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('subject');
            $table->text('message');
            $table->timestamps();
            $table->boolean('read_status')->default(false); // Set to false by default
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact_us');
    }
}
