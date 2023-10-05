<?php

namespace App\Livewire;

use App\Models\Tweet;
use Livewire\Component;

class ShowTweets extends Component
{
    public $message = "";
    public $resposta = '';   
    
    public function render()
    {
        $tweets = Tweet::with('user')->get();
        //$tweets = Tweet::with(['user', 'user.endereco'])->get();
        
        return view('livewire.show-tweets',compact('tweets'));
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
    
}