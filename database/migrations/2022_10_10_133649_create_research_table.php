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
            $table->string("faculty");
            $table->string("study_program");
            $table->string("research_title");
            $table->string("skill_group");
            $table->string("head_name");
            $table->string("head_partner_name")->nullable();
            $table->string("member_partner")->nullable();
            $table->text("member")->nullable();
            $table->text("student")->nullable();
            $table->integer("fund_external");
            $table->integer("fund_total");
            $table->string("research_type");
            $table->string("year");
            $table->string("fund_type");
            $table->string("group_society");
            $table->integer("fund_group_society");
            $table->string("brim");
            $table->integer("fund_brim");
            $table->date("date_start");
            $table->date("date_end");
            $table->string("contract_number");
            $table->string("description");
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
