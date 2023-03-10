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
        Schema::create('achats', function (Blueprint $table) {
            $table->id();
            $table->foreignId("client_id")->constrained("clients");
            $table->foreignId("logement_id")->constrained("logements");
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
        Schema::table("achats", function (Blueprint $table) {
            $table->dropConstrainedForeignId("client_id");
            $table->dropConstrainedForeignId("logement_id");
        });
        Schema::dropIfExists('achats');
    }
};
