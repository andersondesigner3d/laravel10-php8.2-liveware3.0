<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel {{app()->version()}} - Livewire 3 - PHP {{phpversion()}}</title>
    @livewireStyles
</head>
<body>
    <ul>
        <li><a href="/" wire:navigate>Index</a></li>
        <li><a href="tweets" wire:navigate>Novo Tweet</a></li>
        <li><a href="enviar-arquivos" wire:navigate>Enviar Arquivos</a></li>
        <li><a href="enviar-email" wire:navigate>Enviar Email</a></li>
    </ul>
    <hr>
    {{ $slot }}
    @livewireScripts
</body>
</html>