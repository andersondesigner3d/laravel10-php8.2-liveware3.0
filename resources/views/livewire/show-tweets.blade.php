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
        @if($resposta['resposta']=='success')
        {{$resposta['mensagem']}}
        @elseif($resposta=='error')
        {{$resposta['mensagem']}}
        @endif
    </div>
    @endif
    <form method="post" wire:submit='novoTweet'>
        <input wire:model.live="message" type="text" name="message" id="message" >
        <button type="submit">Salvar</button>
    </form>
    <hr>
    <h2>Upload de arquivo:</h2>
    <form wire:submit.prevent="store" enctype="multipart/form-data">
        <input type="file" wire:model="file" id="{{ $idFileInput }}">
        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="store">Enviar</button>
    </form>
    <div wire:loading wire:target="store">Uploading...</div>
    <hr>
    <h2>Lista de Tweets:</h2>
    @if(count($tweets)>0)
    <ul>        
        @foreach($tweets as $dados)
        <li>{{$dados->user->name}} - {{$dados->content}} <button wire:click='excluirTweet("{{$dados->id}}")'>Excluir</button></li>
        @endforeach
    </ul>    
    @else 
    <p>Não há Tweets cadastrados.</p>
    @endif
</div>
