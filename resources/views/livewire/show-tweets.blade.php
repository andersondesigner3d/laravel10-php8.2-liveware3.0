<div>
    <h1>Tweet</h1>
    <hr>
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
        @elseif($resposta['resposta']=='error')
        {{$resposta['mensagem']}}
        @endif
    </div>
    @endif
    <h2>Novo tweet:</h2>
    <form method="post" wire:submit='novoTweet'>
        <input wire:model.live="message" type="text" name="message" id="message" >
        <button type="submit">Salvar</button>
    </form>
    <hr>
    <h2>Upload de imagens:</h2>
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
    <hr>
    <h2>Lista de arquivos:</h2>
    @foreach($arquivos as $item)
    <div>
        <img style="width:20%;float:left;margin:10px;max-height:150px;border-radius:10px" src="{{ asset('storage/uploads/'.str_replace('public/uploads/','',$item)) }}" alt="Minha Imagem">
    </div>
    @endforeach
</div>
