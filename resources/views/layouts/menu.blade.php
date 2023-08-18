<?php

use App\Http\Controllers\PermissionController;
?>

<div class="item">
    <a class="ui logo icon image" href="/">
        <img src="/img/secretaria.svg">
    </a>
    <a href="/"><b>cultura.am</b></a>
</div>
<a class="item" href="/dashboard">
    <b>Início</b>
</a>


<div class="item">
    <div class=" header">Edital</div>
    <div class="menu">
        <a class="item" href="/inscritos">
            inscrições
        </a>
        <!-- <a class="item" href="/panel/inscritos/habilitados">
            Habilitados
        </a> -->
        <!-- <a class="item" href="/panel/inscritos/naohabilitados">
            Não Habilitados
        </a> -->
        <!-- <a class="item" href="/panel/inscritos/habilitacaoI">
            Hablilitação (DOC) I Realizada
        </a> -->
        <!-- <a class="item" href="/panel/inscritos/habilitacaoInaorealizada">
            Hablilitação (DOC) I Não Realizada
        </a> -->
        <!-- <a class="item" href="/panel/inscritos/habilitacaoII">
            Hablilitação (DOC) II Realizada
        </a> -->
        <!-- <a class="item" href="/panel/inscritos/habilitacaoIInaorealizada">
            Hablilitação (DOC) II Não Realizada
        </a> -->
        <!-- <a class="item" href="/panel/inscritos/habilitacaoIII">
            Hablilitação (DOC) III Realizada
        </a> -->
        <!-- <a class="item" href="/panel/inscritos/habilitacaoIIInaorealizada">
            Hablilitação (DOC) III Não Realizada
        </a> -->
        <!-- <a class="item">
            Ranking
        </a> -->
    </div>
</div>


<div class="item">
    <div class=" header">Conta</div>
    <div class="menu">
        <a class="item" href="{{'//sso'.env('SESSION_DOMAIN').'/user/profile' }}">
            Meu perfil
        </a>
        <a class="item" onclick="document.getElementById('logout').submit()">
            Sair
        </a>
    </div>
</div>