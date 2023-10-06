<div>
    @if(isset($resposta) && $resposta!='')
    <div class="row">
        <div class="alert alert-secondary">
            @if($resposta['resposta']=='success')
            {{$resposta['mensagem']}}
            @elseif($resposta['resposta']=='error')
            {{$resposta['mensagem']}}
            @endif
        </div>
    </div>
    @endif
    <div class="row">
        <h2>Envio de Emails:</h2>
        <form wire:submit.prevent="enviaEmail">
            <p>Email de destino:</p>
            <input autofocus class="form-control" type="email" placeholder="Digite o email de destino..." wire:model='emailDeDestino'>
            <p>Assunto o Email:</p>
            <input class="form-control" type="text" placeholder="Digite o assunto do email..." wire:model='assuntoEmail'>
            <br><br>
            <p>Mensagem:</p>
            <textarea class="form-control" name="mensagem" rows="3" placeholder="Digite a mensagem do email..." wire:model='mensagemEmail'></textarea>
            <br>
            <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="enviaEmail">Enviar</button>
            <div wire:loading wire:target="enviaEmail">Enviando email...</div>
        </form>
    </div>    
</div>
