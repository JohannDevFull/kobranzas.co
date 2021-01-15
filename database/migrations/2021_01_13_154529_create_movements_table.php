<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('movements', function (Blueprint $table) {
            $table->bigIncrements('id_movement');  
            $table->foreignId('user_id')->references('user_id')->on('clients');
            $table->foreignId('type_movement_id')->references('id_type_movement')->on('type_movement');
            $table->decimal('valor_movement', $precision = 13, $scale = 2);  
            $table->string('description_movement');  
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
        Schema::dropIfExists('movements');
    }
}
