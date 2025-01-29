<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('tour_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->string('category');
            $table->integer('adults');
            $table->integer('children');
            $table->foreignId('tour_id')->constrained('tour_packages')->onDelete('cascade');  // Assuming you have a TourPackage model
            $table->timestamps();
            $table->boolean('read_status')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('tour_bookings');
    }
}
