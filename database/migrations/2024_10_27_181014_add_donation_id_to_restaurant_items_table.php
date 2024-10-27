<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDonationIdToRestaurantItemsTable extends Migration
{
    public function up()
    {
        Schema::table('restaurant_items', function (Blueprint $table) {
            $table->unsignedBigInteger('donation_id')->nullable()->after('restaurant_id');

            $table->foreign('donation_id')->references('id')->on('donations')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('restaurant_items', function (Blueprint $table) {
            $table->dropForeign(['donation_id']);
            $table->dropColumn('donation_id');
        });
    }
}
