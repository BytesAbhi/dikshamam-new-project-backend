<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('tour_categories', function (Blueprint $table) {
            $table->id();
            $table->string('category')->unique();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('tour_categories');
    }
};
