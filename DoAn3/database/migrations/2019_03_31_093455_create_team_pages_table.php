<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('history');
            $table->string('status');
            $table->integer('id_leader')->unsigned();
            $table->integer('id_lock_status')->unsigned();
            $table->foreign('id_leader')->references('id')->on('leaders')->onDelete('cascade');
            $table->foreign('id_lock_status')->references('id')->on('statuses')->onDelete('cascade');
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
        Schema::dropIfExists('team_pages');
    }
}
