<div>
    <h1>Laravel {{app()->version()}} - Livewire 3 - PHP {{phpversion()}}</h1>
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
    <h2>Novo Tweet:</h2>
    <form method="post" wire:submit='novoTweet'>
        <input wire:model.live="message" type="text" name="message" id="message" required>
        <button type="submit">Salvar</button>
    </form>
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
    <h2>Upload de imagens:</h2>
    <form wire:submit.prevent="store" enctype="multipart/form-data">
        <input type="file" wire:model="file" id="{{ $idFileInput }}" required>
        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="store">Enviar</button>
    </form>
    <div wire:loading wire:target="store">Uploading...</div>
    <hr>
    <h2>Lista de arquivos:</h2>
    @foreach($arquivos as $item)
    <div>
        <img style="width:10%;float:left;margin:10px;height:150px;border-radius:10px" src="{{ asset('storage/uploads/'.str_replace('public/uploads/','',$item)) }}" alt="Minha Imagem">
    </div>
    @endforeach    
    <hr style=" clear: left;">
    <h2>Envio de Emails:</h2>
    <form wire:submit.prevent="enviaEmail">
        <p>Email de destino:</p>
        <input type="email" placeholder="Digite o email de destino..." wire:model='emailDeDestino'>
        <p>Assunto o Email:</p>
        <input type="text" placeholder="Digite o assunto do email..." wire:model='assuntoEmail'>
        <br><br>
        <p>Mensagem:</p>
        <textarea name="mensagem" cols="30" rows="10" placeholder="Digite a mensagem do email..." wire:model='mensagemEmail'></textarea>
        <br><br>
        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="enviaEmail">Enviar</button>
        <div wire:loading wire:target="enviaEmail">Enviando email...</div>
    </form>
</div>
