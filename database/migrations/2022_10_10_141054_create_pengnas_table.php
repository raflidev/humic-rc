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
            $table->string("skill_group")->nullable();
            $table->string("title_abdimas");
            // $table->string("head");
            // $table->text("lecturer")->nullable();
            // $table->string("lecturer_total");
            // $table->text("student")->nullable();
            // $table->string("student_total");
            $table->string("society")->nullable();
            $table->string("society_address")->nullable();
            $table->integer("fund");
            $table->string("city")->nullable();
            $table->string("society_scheme")->nullable();
            $table->string("society_faculty")->nullable();
            $table->boolean('status');
            $table->string('fund_scheme')->nullable();
            $table->string('fund_type')->nullable();
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
