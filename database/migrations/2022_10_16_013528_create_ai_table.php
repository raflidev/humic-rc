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
        Schema::create('ai', function (Blueprint $table) {
            $table->id("ai_id");
            $table->string("year");
            $table->string("faculty");
            $table->string("telu_number");
            $table->string("partner_number");
            $table->string("title");
            $table->string("partner_name");
            $table->string("partner_type");
            $table->date("date");
            $table->string("status_ai");
            $table->string("lndn");
            $table->string("link");
            $table->string("activity_real");
            $table->string("status");
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
        Schema::dropIfExists('ai');
    }
};
