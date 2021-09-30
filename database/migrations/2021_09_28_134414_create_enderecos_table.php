<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("rua");
            $table->integer("numero");
            $table->string("bairro");
            $table->string("cidade");
            $table->string("estado");
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
        Schema::dropIfExists('enderecos');
    }
}
