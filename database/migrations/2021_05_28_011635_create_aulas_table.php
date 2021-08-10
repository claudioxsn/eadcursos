<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aulas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('curso_id')->unsigned()->nullable(false);
            $table->foreign('curso_id')->references('id')->on('cursos');
            $table->string('titulo', 255)->nullable(false);
            $table->date('dataAula')->nullable(false);
            $table->time('horaAula')->nullable(false);
            $table->mediumText('linkAula', 500)->nullable(true);
            $table->string('arquivoVideo')->nullable(true);
            $table->string('arquivoTranscricao')->nullable(true);
            $table->mediumText('descricao', 1000)->nullable(true);
            $table->string('tipo', 20)->nullable(true);
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
        Schema::dropIfExists('aulas');
    }
}
