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
        Schema::create('publikasi', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_publikasi');
            $table->string('judul');
            $table->string('member');
            $table->string('partner');
            $table->string('nama_jurnal');
            $table->string('issue');
            $table->string('volume');
            $table->string('tahun');
            $table->string('quartile');
            $table->string('indexed');
            $table->string('link_makalah');
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
        Schema::dropIfExists('publikasi');
    }
};
