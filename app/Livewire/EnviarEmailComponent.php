<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Mail;
use App\Mail\LivewireMail;

use Livewire\Component;

class EnviarEmailComponent extends Component
{
    public $message = "";
    public $resposta = '';

    public $emailDeDestino;
    public $assuntoEmail;
    public $mensagemEmail; 

    public function render()
    {
        return view('livewire.enviar-email-component');
    }

    public function enviaEmail(){
        try {
            $content = [
                'subject' => $this->assuntoEmail,
                'body' => $this->mensagemEmail,
            ];
            Mail::to($this->emailDeDestino)->send(new LivewireMail($content));
            $this->resposta = [
                'resposta' => 'success',
                'mensagem' => 'Email enviado com sucesso!'
            ];
            $this->emailDeDestino = "";
            $this->assuntoEmail = "";
            $this->mensagemEmail = "";
        } catch (\Throwable $th) {
            $this->resposta = [
                'resposta' => 'error',
                'mensagem' => 'Não foi possível enviar o email! => '.$th->getMessage()
            ];
        }
    }
}