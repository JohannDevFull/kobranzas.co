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
        Schema::create('agreements', function (Blueprint $table) {
            $table->bigIncrements('id_agreement');  
            $table->foreignId('user_id')->references('user_id')->on('clients'); 
            $table->bigInteger('employee_id'); 
            $table->decimal('current_debt',$precision = 13, $scale = 2);
            $table->decimal('credit', $precision = 13, $scale = 2);   
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
