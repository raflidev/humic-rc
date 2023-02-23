
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
        Schema::create('moa', function (Blueprint $table) {
            $table->id("moa_id");
            $table->string("year");
            $table->string("faculty");
            $table->string("moa_number");
            $table->string("moa_number_partner")->nullable();
            $table->string("title");
            $table->string("partner_name");
            $table->string("partner_type");
            $table->date("date_start")->nullable();
            $table->date("date_end")->nullable();
            $table->string("duration")->nullable();
            $table->string("lndn");
            $table->string("pnp");
            $table->string("akd");
            $table->string("link");
            $table->string("activity_real")->nullable();
            $table->string("status_real")->nullable();
            $table->boolean("status");
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
        Schema::dropIfExists('moa');
    }
};
