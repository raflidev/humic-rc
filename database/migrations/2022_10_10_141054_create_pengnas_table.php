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
            $table->string("period");
            $table->string("scheme");
            $table->string("faculty");
            $table->string("study_program");
            $table->string("skill_group");
            $table->string("title_abdimas");
            $table->string("head");
            // lecturer total ()
            // student total ()
            $table->string("society");
            $table->string("society_address");
            $table->string("city");
            $table->string("pengnas_tw");
            $table->integer("fund");
            $table->string("society_scheme");
            $table->string("society_faculty");
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
