<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('birth_date');
            $table->string('gender');
            $table->string('hometown');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('phone');
            $table->integer('id_level')->unsigned();
            $table->string('user_name'); 
            $table->string('password');
            $table->foreign('id_level')->references('id')->on('levels')->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('acounts');
    }
}
