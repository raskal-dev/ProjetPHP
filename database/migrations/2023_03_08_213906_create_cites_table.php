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
        Schema::create('cites', function (Blueprint $table) {
            $table->id("id_cite");
            $table->String("libelle_cite");
            $table->String("adresse_cite");
            $table->String("code_postal_cite");
            $table->foreignId("agence_id")->constrained("agence");
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("agence", function (Blueprint $table){
            $table->dropConstrainedForeignId("agence_id");
        });
        Schema::dropIfExists('cites');
    }
};
