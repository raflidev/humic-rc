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
        Schema::create('isi_target', function (Blueprint $table) {
            $table->id();
            $table->string("id_user");
            $table->string("id_target");
            $table->string("subjek");
            $table->string('id_subjek');
            $table->string("judul");
            $table->string("ketua");
            $table->string("fakultas");
            $table->string("prodi");
            $table->string("kelompok_keahlian");
            $table->string("skema");
            $table->string("total_bantuan");
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
        Schema::dropIfExists('isi_target');
    }
};
