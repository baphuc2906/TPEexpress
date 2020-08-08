<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('comment', function(Blueprint $table){
        $table->increments('id');
        $table->integer('id_user');
        $table->integer('id_tin_tuc')->unsigned();
        $table->foreign('id_tin_tuc')->references('id')->on('tin_tuc')->onDelete('cascade');
        $table->mediumText('noi_dung');
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
        //
         Schema::dropIfExists('comment');
    }
}
