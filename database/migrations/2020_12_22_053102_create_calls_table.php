<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calls', function (Blueprint $table) {
            $table->bigIncrements('id_call');  
            $table->foreignId('client_id')->references('user_id')->on('clients'); 
            $table->string('name_call');
            $table->string('phone_call'); 
            $table->foreignId('employee_id')->references('id')->on('users');  
            $table->string('description'); 
            $table->integer('state_id'); 
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
        Schema::dropIfExists('calls');
    }
}
