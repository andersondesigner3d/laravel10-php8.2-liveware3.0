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
