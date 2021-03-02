<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('agreements', function (Blueprint $table){
            $table->bigIncrements('id_agreement');  
            $table->foreignId('user_id')->references('user_id')->on('clients'); 
            $table->bigInteger('employee_id'); 
            $table->string('name_employee'); 
            $table->foreignId('state_id')->references('id_state')->on('state');
            $table->decimal('capital',$precision = 13, $scale = 2);
            $table->decimal('intereses',$precision = 13, $scale = 2);
            $table->decimal('gastos_cobranzas',$precision = 13, $scale = 2);
            $table->decimal('iva',$precision = 13, $scale = 2);
            $table->decimal('administration',$precision = 13, $scale = 2);
            $table->decimal('total_cuota',$precision = 13, $scale = 2);
            $table->decimal('current_debt',$precision = 13, $scale = 2);
            $table->decimal('credit', $precision = 13, $scale = 2);  
            $table->integer('dia_fecha_pagos');  
            $table->integer('quotas');  
            $table->string('observations');
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
        Schema::dropIfExists('agreements');
    }
}
