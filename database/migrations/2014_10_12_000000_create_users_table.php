<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->smallInteger('role')->default(1);
            $table->string('whatsapp')->nullable();
            $table->string('empresa')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('interesse')->nullable();
            $table->string('site')->nullable();
            $table->string('cep')->nullable();
            $table->string('uf')->nullable();
            $table->string('cidade')->nullable();
            $table->string('bairro')->nullable();
            $table->string('rua')->nullable();
            $table->string('numero')->nullable();
            $table->enum('status', [0,1])->default(0);//0 - inativo; 1 - ativo
            $table->enum('termos', [0,1])->default(0);//0 - nao aceito; 1 - aceito
            $table->enum('perfil', [0,1])->default(0);//0 - incompleto; 1 - completo
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
