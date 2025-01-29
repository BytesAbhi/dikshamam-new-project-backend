<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('hotel_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->date('check_in_date');
            $table->date('check_out_date');
            $table->integer('adults')->default(1);
            $table->integer('children')->default(0);
            $table->foreignId('destination')->constrained('hotel_destinations')->onDelete('cascade');
            $table->string('stay_type')->comment('Hotel, Resort, Apartment, etc.');
            $table->timestamp('added_on')->useCurrent();
            $table->boolean('read_status')->default(0);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('hotel_bookings');
    }
};
