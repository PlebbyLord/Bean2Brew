<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerificationImagesTable extends Migration
{
    public function up()
    {
        Schema::create('verification_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('verify_id')->constrained()->onDelete('cascade');; // Add this line to create the foreign key
            $table->string('path'); // Add other columns as needed
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('verification_images');
    }
}

