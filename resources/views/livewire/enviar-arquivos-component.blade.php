<div>
    @if(isset($resposta) && $resposta!='')
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
</div>
