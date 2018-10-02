<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSBayarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_bayar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ref_id');
            $table->string('ref_tag');
            $table->text('deskripsi');
            $table->double('jumlah');
            $table->softDeletes();
            $table->timestamps();
            $table->integer('s_header_id')->unsigned();
            $table->foreign('s_header_id')->references('id')->on('s_header')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_bayar');
    }
}
