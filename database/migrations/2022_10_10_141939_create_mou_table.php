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
            $table->string("title");
            $table->string("partner_name");
            $table->string("partner_type");
            $table->string("telu_number");
            $table->string("faculty");
            $table->string("partner_number");
            $table->date("date_start");
            $table->date("date_end");
            $table->string("duration");
            $table->string("status");
            $table->string("file");
            $table->string("lndn");
            $table->string("pnp");
            $table->string("akd");
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
