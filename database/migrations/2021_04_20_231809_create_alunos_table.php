<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('imagemPerfil')->nullable(true);
            $table->string('nome', 60)->nullable(false);
            $table->date('dataNasc')->nullable(true);
            $table->string('cpf', 14)->unique()->nullable(true);
            $table->string('rg', 14)->nullable(true);
            $table->string('celular_obr', 14)->nullable(false);
            $table->string('celular_op', 14)->nullable(true);
            $table->string('cidade', 60)->nullable(true); 
            $table->string('uf', 2)->nullable(true); 
            $table->string('rua', 70)->nullable(true);
            $table->string('numero', 6)->nullable(true);
            $table->string('complemento', 60)->nullable(true);
            $table->string('bairro', 60)->nullable(true);
            $table->string('cep', 9)->nullable(true);
            $table->string('observacoes', 255)->nullable(true);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('status',10)->nullable(true);
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
        Schema::dropIfExists('alunos');
    }
}
