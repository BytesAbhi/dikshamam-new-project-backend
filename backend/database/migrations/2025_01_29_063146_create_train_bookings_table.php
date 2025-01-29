<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('train_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->text('message')->nullable();
            $table->timestamp('added_on')->useCurrent();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('train_bookings');
    }
};
