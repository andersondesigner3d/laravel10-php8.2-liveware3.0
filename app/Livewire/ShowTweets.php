<?php

namespace App\Livewire;

use App\Models\Tweet;
use Livewire\Component;

class ShowTweets extends Component
{
    public $message = "valor";
    public $resposta = '';

    public function muda(){
        $this->message = "mudou o texto";
    }

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
            $this->resposta = 'success';

        } catch (\Throwable $th) {

            $this->message = '';
            $this->resposta = 'error';
            
        }
        
    }
}
