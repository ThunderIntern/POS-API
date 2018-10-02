<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrateTABLENAMETable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TABLE_NAME', function ($table) {
            // Id
            $table->BigIncrements('id');
            $table->uuid('uuid')->index();

            // Internal Relations

            // External Relations

            // Attributes

            // Timestamps
            $table->timestampsTz();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('TABLE_NAME');
    }
}
