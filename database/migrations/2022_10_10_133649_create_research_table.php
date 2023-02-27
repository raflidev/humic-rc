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
        Schema::create('research', function (Blueprint $table) {
            $table->id('research_id');
            $table->string('user_id');
            $table->string("faculty");
            $table->string("study_program");
            $table->string("research_title");
            $table->string("skill_group");
            $table->string("head_name");
            $table->string("head_partner_name")->nullable();
            $table->string("member_partner")->nullable();
            $table->text("member")->nullable();
            $table->text("student")->nullable();
            $table->bigInteger("fund_external")->nullable();
            $table->bigInteger("fund_total")->nullable();
            $table->string("research_type")->nullable();
            $table->string("year")->nullable();
            $table->string("fund_type")->nullable();
            $table->string("group_society")->nullable();
            $table->bigInteger("fund_group_society")->nullable();
            $table->string("brim")->nullable();
            $table->bigInteger("fund_brim")->nullable();
            $table->date("date_start")->nullable();
            $table->date("date_end")->nullable();
            $table->string("contract_number")->nullable();
            $table->string("description")->nullable();
            $table->boolean('status');
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
        Schema::dropIfExists('research');
    }
};
