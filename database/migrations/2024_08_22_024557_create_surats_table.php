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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jenis_surat_id');
            $table->string('nama');
            $table->string('nik', 20);
            $table->string('rt');
            $table->string('rw');
            $table->string('status')->default('diajukan');
            $table->date('tanggal_surat');
            $table->timestamps();
            $table->foreign('jenis_surat_id')->references('id')->on('jenis_surats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surats');
    }
};
