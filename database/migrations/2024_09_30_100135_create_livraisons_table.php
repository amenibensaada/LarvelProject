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
       Schema::create('livraisons', function (Blueprint $table) {
            $table->id();
            $table->date('date_livraison');
            $table->string('status');
            $table->integer('quantite_livree');
            $table->integer('association_id');
            $table->integer('produit_alimentaire_id');
            $table->foreignId('transporteur_id')->constrained('transporteurs')->onDelete('cascade');
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
        Schema::dropIfExists('livraisons');
    }
};
