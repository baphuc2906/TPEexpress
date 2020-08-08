<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LoaiTin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('loai_tin', function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_the_loai')->unsigned();
            $table->foreign('id_the_loai')->references('id')->on('the_loai')->onDelete('cascade');
            $table->string('ten',255);
            $table->string('ten_khong_dau',255);
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
        Schema::dropIfExists('loai_tin');
    }
}
