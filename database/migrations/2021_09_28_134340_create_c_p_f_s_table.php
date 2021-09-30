<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCPFSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_p_f_s', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("numero");
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
        Schema::dropIfExists('c_p_f_s');
    }
}
