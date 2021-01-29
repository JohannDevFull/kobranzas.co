<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrasabilidadClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trasabilidad_client', function (Blueprint $table) {
            $table->bigIncrements('id_trasabilidad');
            $table->bigInteger('id_building');
            $table->string('code_client');
            $table->string('name_client'); 
            $table->enum('action', ['LLAMADA','ACUERDO','MOVIMIENTO','RECIBO COBRO']); 
            $table->decimal('current_debt', $precision = 13, $scale = 2);  
            $table->decimal('valor_pagar', $precision = 13, $scale = 2);  
            $table->decimal('valor_cobranzas', $precision = 13, $scale = 2);  
            $table->decimal('new_debt', $precision = 13, $scale = 2);  
            $table->decimal('capital_debt', $precision = 13, $scale = 2);  
            $table->decimal('cobranzas_debt', $precision = 13, $scale = 2);  
            $table->string('state');  
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
        Schema::dropIfExists('trasabilidad_client');
    }
}
