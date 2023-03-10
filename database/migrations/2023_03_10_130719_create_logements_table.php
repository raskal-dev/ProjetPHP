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
        Schema::create('logements', function (Blueprint $table) {
            $table->id();
            $table->String("num_logement");
            $table->String("type_vente");
            $table->double("prix_logement", 11.2);
            $table->foreignId("terrain_id")->constrained("terrains");
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
        Schema::table("logements", function (Blueprint $table) {
            $table->dropConstrainedForeignId("terrain_id");
        });
        Schema::dropIfExists('logements');
    }
};
