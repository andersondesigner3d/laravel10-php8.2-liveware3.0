<div>
    @if($resposta!='')
    <div class="row">
        <div class="col md-12">
            <div class="alert alert-secondary">
                @if($resposta['resposta']=='success')
                {{$resposta['mensagem']}}
                @elseif($resposta['resposta']=='error')
                {{$resposta['mensagem']}}
                @endif
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col md-12">
            <h2>Novo Tweet:</h2>
            <form method="post" wire:submit='novoTweet'>
                <div class="input-group mb-3">
                    <input autofocus wire:model.live="message" name="message" id="message" required type="text" class="form-control" placeholder="Digite o novo Tweet aqui..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Button</button>
                    </div>
                </div>
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
    </div>    
</div>
