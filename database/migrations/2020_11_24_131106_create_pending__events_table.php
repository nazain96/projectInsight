<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendingEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending__events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sid');
            $table->integer('hits');
            $table->timestamp('firstseen_at', 0);
            $table->timestamp('lastseen_at', 0);
            $table->string('signature', 300);
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
        Schema::dropIfExists('pending__events');
    }
}
