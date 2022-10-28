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
        Schema::create('marchandises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id');
            $table->foreignId('chargeur_id');
            $table->foreignId('voyage_id'); // à duquel on va afficher numVoy, année, navire
            $table->string('cond1');
            $table->integer('qty1');
            $table->integer('poids1');
            $table->integer('valeur1');
            $table->integer('cubage1');
            $table->string('monnaie1');
            $table->integer('reduction1');
            $table->string('avisClient')->default('RAS');
            $table->string('plainteClient')->default('RAS');
            $table->string('reponseLmc')->default('RAS');

            // $table->integer('valeur2');

            // $table->string('cond3');
            // $table->integer('qty3');
            // $table->integer('poids3');
            // $table->integer('valeur3');

            // $table->string('cond4');
            // $table->integer('qty4');
            // $table->integer('poids4');
            // $table->integer('valeur4');
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
        Schema::dropIfExists('marchandises');
    }
};
