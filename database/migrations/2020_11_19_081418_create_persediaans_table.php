<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersediaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persediaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('no_dokumen');
            $table->integer('no_bukti');
            $table->date('tgl_pembukuan');
            $table->date('tgl_dokumen');
            $table->integer('detail_id');
            $table->integer('jenis_persediaan_id');
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
        Schema::dropIfExists('persediaans');
    }
}
