<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_status', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('tanggal');
            $table->string('status');
            $table->string('progress');
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
        Schema::dropIfExists('s_status');
    }
}
