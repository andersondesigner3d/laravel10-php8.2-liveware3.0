<div>
    <h1>Mostra os Teets</h1>
    <p>{{$message}}</p>
    @if($resposta!='')
    <div style="
    background-color: lightgray;
    border-radius:5px;
    padding: 10px;
    margin-bottom:10px;
    ">
        @if($resposta=='success')
        Tweet cadastrado com sucesso!
        @elseif($resposta=='error')
        Não foi possível cadastrar Tweet, tente novamente.
        @endif
    </div>
    @endif
    <form method="post" wire:submit='novoTweet'>
        <input wire:model.live="message" type="text" name="message" id="message" >
        <button type="submit">Salvar</button>
    </form>    
    <hr>
    <h2>Lista de Tweets:</h2>
    @if(count($tweets)>0)
    <ul>        
        @foreach($tweets as $dados)
        <li>{{$dados->user->name}} - {{$dados->content}}</li>
        @endforeach
    </ul>    
    @else 
    <p>Não há Tweets cadastrados.</p>
    @endif
</div>
