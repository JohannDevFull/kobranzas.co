<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->references('id')->on('users');
            $table->foreignId('client_id')->references('user_id')->on('clients'); 
            $table->string('description');
            $table->dateTime('date');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('reminders');
    }
}
