<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeMovementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_movement', function (Blueprint $table) {
            $table->bigIncrements('id_type_movement');
            $table->string('name_movement'); 
            $table->enum('nature_movement', ['DEBITO', 'CREDITO']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_movement');
    }
}
