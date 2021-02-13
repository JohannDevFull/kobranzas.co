<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempUsersTable extends Migration
{

    public function up()
    {
        
        Schema::create('temp_users', function (Blueprint $table) {
            $table->id();
            $table->string('idTemp');
            $table->string('name');
            $table->string('email');
            $table->string('document');
            $table->boolean('status')->default(false);
            $table->string('user_name')->nullable();
            $table->foreignId('user_id')->nullable()
            ->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->text('photo')->default('/storage/img/guest.png');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('temp_users');
    }
}
