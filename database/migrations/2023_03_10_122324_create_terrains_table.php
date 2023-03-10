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
        Schema::create('terrains', function (Blueprint $table) {
            $table->id();
            $table->String("nom_terrain");
            $table->double("superficie_terrain", 10.2);
            $table->foreignId("cite_id")->constrained("cites");
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
        Schema::table("terrains", function (Blueprint $table) {
            $table->dropConstrainedForeignId("cite_id");
        });
        Schema::dropIfExists('terrains');
    }
};
