<h2 class="ui dividing header">Avaliação (Curadoria)</h2>

@if(isset($avII->a_nota))
<p>Já Avaliado</p>
@else
<form action="/panel/inscritos/avaliacaoIISave" class="ui form" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$inscricao->uuid}}">

    <div style="margin-top: 2rem ">
        <div class="field">
            <label>A - Dramaturgia da Obra</label>
            <input type="number" name="a_nota" placeholder="Nota 0 á 5" max="5" min="0" step=0.01>
        </div>
        <div class="field">
            <label>Observação</label>
            <textarea name="a_observacao"></textarea>
        </div>
        <div class="field">
            <label>B - Desenvolvimento Cênico da Obra</label>
            <input type="number" name="b_nota" placeholder="Nota 0 á 5" max="5" min="0" step=0.01>
        </div>
        <div class="field">
            <label>Observação</label>
            <textarea name="b_observacao"></textarea>
        </div>
        <div class="field">
            <label>C - Exequibilidade</label>
            <input type="number" name="c_nota" placeholder="Nota 0 á 5" max="5" min="0" step=0.01>
        </div>
        <div class="field">
            <label>Observação</label>
            <textarea name="c_observacao"></textarea>
        </div>
        <div class="field">
            <label>D - Qualidade Artística do Intérpretes</label>
            <input type="number" name="d_nota" placeholder="Nota 0 á 5" max="5" min="0" step=0.01>
        </div>
        <div class="field">
            <label>Observação</label>
            <textarea name="d_observacao"></textarea>
        </div>

        <div class="field">
            <label>E - Avaliação do Portifólio</label>
            <input type="number" name="e_nota" placeholder="Nota 0 á 5" max="5" min="0" step=0.01>
        </div>
        <div class="field">
            <label>Observação</label>
            <textarea name="e_observacao"></textarea>
        </div>


    </div>
    <br>
    <div align="center">
        <input type="submit" class="ui inverted primary button" value="Enviar Analise">

    </div>

    <script>
        $('input[name=a_nota]').change(function() {
            console.log($('input[name=a_nota]').val());
            if ($('input[name=a_nota]').val() < 0) {
                $('input[name=a_nota]').val(null);
                alert('Quesito A com valor Invalido (valores permitidos  de 0 - 5)');
            }
            if ($('input[name=a_nota]').val() > 5) {
                $('input[name=a_nota]').val(null);
                alert('Quesito A com valor Invalido (valores permitidos  de 0 - 5)');
            }
        });

        $('input[name=b_nota]').change(function() {
            console.log($('input[name=b_nota]').val());
            if ($('input[name=b_nota]').val() < 0) {
                $('input[name=b_nota]').val(null);
                alert('Quesito A com valor Invalido (valores permitidos  de 0 - 5)');
            }
            if ($('input[name=b_nota]').val() > 5) {
                $('input[name=b_nota]').val(null);
                alert('Quesito A com valor Invalido (valores permitidos  de 0 - 5)');
            }
        });
        $('input[name=c_nota]').change(function() {
            console.log($('input[name=c_nota]').val());
            if ($('input[name=c_nota]').val() < 0) {
                $('input[name=c_nota]').val(null);
                alert('Quesito A com valor Invalido (valores permitidos  de 0 - 5)');
            }
            if ($('input[name=c_nota]').val() > 5) {
                $('input[name=c_nota]').val(null);
                alert('Quesito A com valor Invalido (valores permitidos  de 0 - 5)');
            }
        });
        $('input[name=d_nota]').change(function() {
            console.log($('input[name=d_nota]').val());
            if ($('input[name=d_nota]').val() < 0) {
                $('input[name=d_nota]').val(null);
                alert('Quesito A com valor Invalido (valores permitidos  de 0 - 5)');
            }
            if ($('input[name=d_nota]').val() > 5) {
                $('input[name=d_nota]').val(null);
                alert('Quesito A com valor Invalido (valores permitidos  de 0 - 5)');
            }
        });
        $('input[name=e_nota]').change(function() {
            console.log($('input[name=e_nota]').val());
            if ($('input[name=e_nota]').val() < 0) {
                $('input[name=e_nota]').val(null);
                alert('Quesito A com valor Invalido (valores permitidos  de 0 - 5)');
            }
            if ($('input[name=e_nota]').val() > 5) {
                $('input[name=e_nota]').val(null);
                alert('Quesito A com valor Invalido (valores permitidos  de 0 - 5)');
            }
        });
    </script>
    @endif
</form>