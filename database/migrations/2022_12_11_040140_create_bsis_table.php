<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBsisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bsis', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('desa_pekraman');
            $table->string('data_lokasi');
            $table->string('media');
            $table->string('layanan');
            $table->string('lokasi');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('nama_pic');
            $table->string('nomor_tlp');
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
        Schema::dropIfExists('bsis');
    }
}
