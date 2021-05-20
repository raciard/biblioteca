<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestitos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestamp("data_fine")->nullable();
            $table->boolean("restituito")->default(false);
            $table->foreignId("copia_id")->constrained(); 
            $table->foreignId("user_id")->constrained(); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestitos');
    }
}
