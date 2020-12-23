<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id_payment');  
            $table->decimal('valor_payment', $precision = 13, $scale = 4); 
            $table->bigInteger('employee_id');  
            $table->date('date_payment');
            $table->foreignId('paymen_type')->references('id_type')->on('type_payment'); 
            $table->bigInteger('agreement_id');
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
        Schema::dropIfExists('payments');
    }
}
