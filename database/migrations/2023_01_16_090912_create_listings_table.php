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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->references('id')->onDelete('cascade');
            $table->string('name');
            $table->text('description');

            $table->double('price_per_hour', 8, 2);
            $table->double('price_per_day', 8, 2);

            // $table->tinyInteger('half_day_discount');
            // $table->tinyInteger('half_discount_rate');
            $table->tinyInteger('full_day_discount');
            $table->tinyInteger('full_discount_rate');
            $table->double('sale_tax', 8, 2);
            $table->text('full_day_start_time');
            $table->text('full_day_end_time');
            $table->text('min_hour');
            $table->text('adult')->nullable();
            $table->text('child')->nullable();
            $table->text('advance_notice');
            $table->integer('status');
 
          
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
        Schema::dropIfExists('listings');
    }
};
