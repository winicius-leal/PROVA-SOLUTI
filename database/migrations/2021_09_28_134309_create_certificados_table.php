<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificados', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("dn");
            $table->string("issuerDn");
            $table->string("notBefore");
            $table->string("notAfter");
            $table->unsignedBigInteger("pessoa_id");
            $table->foreign("pessoa_id")->references("id")->on("pessoas");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificados');
    }
}
