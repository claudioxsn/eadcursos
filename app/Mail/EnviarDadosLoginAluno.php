<?php

namespace App\Mail;

use App\Models\Aluno;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviarDadosLoginAluno extends Mailable
{
    use Queueable, SerializesModels;

    protected $aluno;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Aluno $aluno)
    {
        $this->aluno = $aluno;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('IBPC');
        $this->to($this->aluno->email, $this->aluno->nome);
        return $this->markdown('emails.dadosLoginAluno', ['aluno' => $this->aluno]);
    }
}
