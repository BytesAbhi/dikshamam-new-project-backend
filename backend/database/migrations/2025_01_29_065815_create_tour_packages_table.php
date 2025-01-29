<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tour_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_cat_id')->constrained('tour_categories')->onDelete('cascade');
            $table->foreignId('destination_id')->constrained('hotel_destinations')->onDelete('cascade');
            $table->foreignId('tour_type')->constrained('tour_types')->onDelete('cascade');
            $table->string('tour_code')->unique();
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('nights');
            $table->integer('days');
            $table->text('itinerary');
            $table->text('inclusions');
            $table->text('exclusions');
            $table->decimal('price', 10, 2);
            $table->string('image')->nullable();
            $table->boolean('is_featured')->default(0);
            $table->string('meta_title')->nullable();
            $table->text('meta_desc')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tour_packages');
    }
};
