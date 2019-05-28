<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('headers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('logo');
            $table->string('logoDescricao');
            $table->string('banner');
            $table->string('bannerDescricao');
            $table->enum('status', [0,1])->default(0);//0 - inativo; 1 - ativo
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
        Schema::dropIfExists('headers');
    }
}
