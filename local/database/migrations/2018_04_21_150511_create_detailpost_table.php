<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailpostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('detailpost');
        Schema::create('detailpost', function (Blueprint $table) {
            $table->increments('idDetailPost');
            $table->string('nameDetailPost');
            $table->string('urlDetailPost');
            $table->text('presentDetailPost');
            $table->text('contentDetailPost');
            $table->date('dateDetailPost');
            $table->string('imgDetailPost');
            $table->integer('idCat');
            $table->string('signature');
            $table->string('author');
            $table->string('views');
            $table->string('enable');
            $table->string('popular');
            $table->string('head_position');
            $table->string('update');

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
    }
}
