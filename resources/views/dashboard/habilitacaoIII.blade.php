<h2 class="ui dividing header">Habilitação (Analise documental)</h2>

@if(isset($habilitacaoIII->avaliacao))
<p>Já Avaliado</p>
    @else
    <form action="/panel/inscritos/habilitacaoIIISave" class="ui form" method="post">
        @csrf
        <div style="margin-top: 2rem ">
            <div class="grouped fields">
                <input type="hidden" name="id" value="{{$inscricao->uuid}}">
                <div class="field">
                    <div class="ui slider checkbox">
                     
                        <input type="radio" name="habilitacao" value="0">
    
                        <label>Habilitar</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui slider checkbox">

                        <input type="radio" name="habilitacao" value="1">
    
                        <label>Não Habilitar</label>
                    </div>
                </div>
    
            </div>
            <div class="field">
                <label>Observação</label>
                <textarea name="observacao_habilitacao"></textarea>
            </div>
        </div>
        <br>
        <div align="center">
            <input type="submit" class="ui inverted primary button" value="Enviar Analise">
    
        </div>
    @endif
</form>
