<div>
    @if($resposta!='')
    <div style="
    background-color: lightgray;
    border-radius:5px;
    padding: 10px;
    margin-bottom:10px;
    ">
        @if($resposta['resposta']=='success')
        {{$resposta['mensagem']}}
        @elseif($resposta['resposta']=='error')
        {{$resposta['mensagem']}}
        @endif
    </div>
    @endif
    <h2>Novo Tweet:</h2>
    <form method="post" wire:submit='novoTweet'>
        <input wire:model.live="message" type="text" name="message" id="message" required>
        <button class="btn btn-primary" type="submit">Salvar</button>
    </form>
    @if($message)
    <p><strong>Exemplo de wire:model.live: </strong>{{$message}}</p>
    @endif
    <hr>
    <h2>Lista de Tweets:</h2>
    @if(count($tweets)>0)
    <ul>        
        @foreach($tweets as $dados)
        <li>{{$dados->user->name}} - {{$dados->content}} <button class="btn btn-sm btn-danger" wire:click='excluirTweet("{{$dados->id}}")'>Excluir</button></li>
        @endforeach
    </ul>    
    @else 
    <p>Não há Tweets cadastrados.</p>
    @endif
    
</div>
