<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengnas', function (Blueprint $table) {
            $table->id("pengnas_id");
            $table->string("scheme");
            $table->string("title_abdimas");
            $table->string("society_address");
            $table->string("head");
            $table->string("city");
            $table->string("society");
            $table->string("pengnas_tw");
            $table->string("faculty");
            $table->string("student_program");
            $table->string("fund");
            $table->string("skill_group");
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
        Schema::dropIfExists('pengnas');
    }
};
