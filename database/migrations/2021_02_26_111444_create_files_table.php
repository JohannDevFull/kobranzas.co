<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->text('path');
            $table->string('description');
            $table->foreignId('client_id')->references('user_id')->on('clients'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('files');
    }
}
