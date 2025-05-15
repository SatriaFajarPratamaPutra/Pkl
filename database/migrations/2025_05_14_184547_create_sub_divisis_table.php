<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubDivisisTable extends Migration
{
    public function up()
    {
        Schema::create('sub_divisis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->string('wilayah');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sub_divisis');
    }
}
