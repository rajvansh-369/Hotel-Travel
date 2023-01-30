<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bedrooms_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained('listings')->references('id')->onDelete('cascade');
            $table->text('bedroom_name');
            $table->text('bedroom_price');
            $table->text('bedroom_image');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bedrooms_types');
    }
};
