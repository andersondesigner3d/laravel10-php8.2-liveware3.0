<?php

namespace App\Livewire;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Livewire\WithFileUploads;

use Livewire\Component;

class EnviarArquivosComponent extends Component
{
    use WithFileUploads;
    public $idFileInput = 1;
    public $resposta = '';    
    public $file;

    public function render()
    {
        $arquivos = Storage::files('public/uploads');
        return view('livewire.enviar-arquivos-component',compact('arquivos'));
    }

    public function store()
    {
       try {
        
            $this->validate([
                'file' => 'required|image|file|max:1024',
            ]);
            $path = $this->file->store('public/uploads');

            // Limpe o campo de upload após o sucesso.
            $this->idFileInput = md5(time());

            $this->resposta = [
                'resposta' => 'success',
                'mensagem' => 'Arquivo enviado com sucesso! Destino: '.$path
            ];
       } catch (ValidationException $e) {
            $this->resposta = [
                'resposta' => 'error',
                'mensagem' => 'Não foi possível validar o arquivo! => '.$e->getMessage()
            ];
            $this->idFileInput = md5(time());
       } catch (\Throwable $th) {
        $this->resposta = [
            'resposta' => 'error',
            'mensagem' => 'Não foi possível validar o arquivo!'
        ];
        $this->idFileInput = md5(time());
       }
    }
}