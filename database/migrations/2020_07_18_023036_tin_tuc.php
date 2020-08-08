<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TinTuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
            Schema::create('tin_tuc', function(Blueprint $table){
            $table->increments('id');
            $table->string('tieu_de',255);
            $table->string('tieu_de_khong_dau',255);
            $table->string('tom_tat',255);
            $table->mediumText('noi_dung');
            $table->string('hinh');
            $table->integer('noi_bat');
            $table->integer('so_luot_xem');
            $table->integer('id_loai_tin')->unsigned();
            $table->foreign('id_loai_tin')->references('id')->on('loai_tin')->onDelete('cascade');
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
        Schema::dropIfExists('tin_tuc');
    }
}
