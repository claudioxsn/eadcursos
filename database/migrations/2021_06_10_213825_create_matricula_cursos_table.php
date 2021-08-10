<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculaCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matricula_cursos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('curso_id')->unsigned()->nullable(false);
            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->bigInteger('aluno_id')->unsigned()->nullable(false);
            $table->foreign('aluno_id')->references('id')->on('alunos');
            $table->date('dataConfirmacao')->nullable(true);
            $table->string('status_matricula')->nullable(false);
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
        Schema::dropIfExists('matricula_cursos');
    }
}
