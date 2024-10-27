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
    Schema::create('restaurant_items', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('restaurant_id'); // Foreign key to the restaurant
        $table->string('name');  // Name of the item
        $table->text('description')->nullable();  // Description of the item
        $table->integer('quantity');  // Quantity available for donation
        $table->timestamps();

        // Foreign key constraint
        $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurant_items');
    }
};
