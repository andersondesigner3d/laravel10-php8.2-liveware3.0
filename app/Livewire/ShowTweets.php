<?php

namespace App\Livewire;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

use App\Models\Tweet;
use Livewire\Component;

class ShowTweets extends Component
{
    public $message = "";
    public $resposta = '';
    use WithFileUploads;
    public $file;
    public $idFileInput = 1;
    
    public function render()
    {
        $tweets = Tweet::with('user')->get();
        //$tweets = Tweet::with(['user', 'user.endereco'])->get();
        $arquivos = Storage::files('public/uploads');

        return view('livewire.show-tweets',compact('tweets','arquivos'));
    }

    public function novoTweet(){
        try {

            Tweet::create([
                'content' => $this->message,
                'user_id' => 1,
            ]);
            $this->message = '';
            $this->resposta = [
                'resposta' => 'success',
                'mensagem' => 'Tweet cadastrado com sucesso!'
            ];

        } catch (\Throwable $th) {

            $this->message = '';
            $this->resposta = [
                'resposta' => 'success',
                'mensagem' => 'Não foi possível cadastrar o Tweet!'
            ];
            
        }
        
    }

    public function excluirTweet($idTweet){
        try {
            Tweet::find($idTweet)->delete();
            $this->resposta = [
                'resposta' => 'success',
                'mensagem' => 'Tweet excluído com sucesso!'
            ];
        } catch (\Throwable $th) {
            $this->resposta = [
                'resposta' => 'error',
                'mensagem' => 'Não foi possível excluir o Tweet!'
            ];
        }
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
