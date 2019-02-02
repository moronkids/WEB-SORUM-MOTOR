<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGambarToColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('motors', function (Blueprint $table) {
          $table->string('filename')->nullable();
          $table->string('mime')->nullable();
          $table->string('original_filename')->nullable();
          $table->string('dimensions');
          $table->string('path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('motors', function (Blueprint $table) {
            //
        });
    }
}
