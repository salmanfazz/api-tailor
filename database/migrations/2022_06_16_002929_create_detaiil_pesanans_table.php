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
        Schema::create('detaiil_pesanans', function (Blueprint $table) {
            $table->increments('id_detaiil_pesanans');
            $table->string('lingkar_dada');
            $table->string('lingkar_pinggul');
            $table->string('lingkar_pinggang');
            $table->string('panjang_baju');
            $table->string('panjang_lengan');
            $table->string('panjang_celana');
            $table->string('keterangan');
            $table->text('gambar');
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
        Schema::dropIfExists('detaiil_pesanans');
    }
};
