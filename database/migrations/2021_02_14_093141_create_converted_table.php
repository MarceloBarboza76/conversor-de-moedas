<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConvertedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('converted', function (Blueprint $table) {
            $table->id('id_converted');
            $table->string('moeda_base');
            $table->string('moeda_converted');
            $table->decimal('value_base', 20, 2);
            $table->decimal('value_converted', 20, 2);
            $table->dateTime('date_add');
            $table->dateTime('date_update');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('converted');
    }
}
