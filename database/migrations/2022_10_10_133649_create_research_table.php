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
            $table->string("study_program");
            $table->string("faculty");
            $table->string("research_title");
            $table->string("skill_group");
            $table->string("year");
            $table->string("group_society");
            $table->string("fund_group_society");
            $table->string("brim");
            $table->string("fund_brim");
            $table->date("date_contract");
            $table->string("description");
            $table->string("head_name");
            $table->string("head_partner_name");
            $table->string("fund_external");
            $table->string("fund_total");
            $table->string("fund_type");
            $table->string("research_type");
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
