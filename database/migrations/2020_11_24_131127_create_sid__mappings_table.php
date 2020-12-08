<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSidMappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sid__mappings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sid');
            $table->string('technique_name');
            $table->string('threat_name');
            $table->string('threat_class');
            $table->string('severity');
            $table->integer('state');
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
        Schema::dropIfExists('sid__mappings');
    }
}
