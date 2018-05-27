<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDownloadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('download');
        Schema::create('download', function (Blueprint $table) {
            $table->increments('idDown');
            $table->string('nameDown');
            $table->string('linkDown');
            $table->string('imgDown');
            $table->integer('enable');
            $table->integer('idDetailPost')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('download');
    }
}
