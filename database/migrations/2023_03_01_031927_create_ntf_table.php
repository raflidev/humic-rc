<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('ntf', function (Blueprint $table) {
            $table->id();
            $table->string("tahun");
            $table->string("dana");
            $table->timestamps();
        });

        DB::table('ntf')->insert(
            array(
                'tahun' => '2020',
                'dana' => "1000000",
            )
        );

        DB::table('ntf')->insert(
            array(
                'tahun' => '2021',
                'dana' => "1100000",
            )
        );

        DB::table('ntf')->insert(
            array(
                'tahun' => '2022',
                'dana' => "1200000",
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ntf');
    }
};
