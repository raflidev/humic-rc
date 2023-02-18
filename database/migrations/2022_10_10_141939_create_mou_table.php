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
        Schema::create('mou', function (Blueprint $table) {
            $table->id("mou_id");
            $table->string("year");
            $table->string("faculty")->nullable();
            $table->string("telu_number")->nullable();
            $table->string("title")->nullable();
            $table->string("partner_number")->nullable();
            $table->string("partner_name")->nullable();
            $table->string("partner_type")->nullable();
            $table->date("date_start")->nullable();
            $table->date("date_end")->nullable();
            $table->string("duration")->nullable();
            $table->string("lndn");
            $table->string("pnp");
            $table->string("akd");
            $table->string("file")->nullable();
            $table->string("activity_real")->nullable();
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
        Schema::dropIfExists('mou');
    }
};
