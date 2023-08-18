<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrição </title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
    <script src="/js/cep.js"></script>
    <style>
        body {
            padding-top: 2rem;
            margin-bottom: 2rem;
            background-color: #ebe6dd;
        }

        .ocultar {
            display: none;
        }

        .exibir {
            display: block;
        }

        .separacao {
            padding-bottom: 1rem;

        }

        .box-principal {

            padding: 2rem;
            background-color: white;
            border-radius: 1rem;
            box-shadow: 2px 0px 5px rgba(0, 0, 0, 0.4)
        }
    </style>
</head>

<body>
    <div class="ui container box-principal">

        <!-- <div style="margin: auto; text-align:center;"><img src="/img/logo-3.jpg" style="min-width: 350px; max-width: 360px;"></div> -->
        @if ($errors->any())
        <div class="ui error message">
            <i class="close icon"></i>
            <div class="header">
                Ocorreu um problema com a sua solicitação
            </div>
            <ul class="list">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="post" class="ui form" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <label for="">Tipo</label>
                <div class="ui radio checkbox">
                    <input type="radio" name="tipo" id="pf" class="ui checkbox" value="pf" required checked>
                    <label for="pf">Pessoa Física</label>
                </div>
                <br>
                <!-- <div class="ui radio checkbox">
                    <input type="radio" name="tipo" id="pj" class="ui checkbox" value="pj" required>
                    <label for="pj">Pessoa Jurídica</label>
                </div> -->
                <br>
                <br>
            </div>
            <div class="separacao" id="div-pf">
                <h3>Informações de Pessoa Física</h3>
                <div class="three fields">
                    <div class="field">
                        <label for="pf-nome">Nome completo</label>
                        <input type="text" name="pf-nome" id="pf-nome" value="{{ old('pf-nome') }}">
                    </div>
             
                    <div class="field">
                        <label for="pf-nacionalidade">Nacionalidade</label>
                        <input type="text" name="pf-nacionalidade" id="pf-nacionalidade" value="{{ old('pf-nacionalidade') }}">
                    </div>
                    <div class="field">
                        <label for="pf-nascimento">Data de nascimento</label>
                        <input type="date" name="pf-nascimento" id="pf-nascimento" value="{{ old('pf-nascimento') }}">
                    </div>
                </div>
             
                <div class="four fields">
                    <div class="field">
                        <label for="pf-cpf">CPF</label>
                        <input type="text" name="pfCpf" id="pfCpf" value="{{ old('pfCpf') }}" maxlength="11" placeholder="Apenas numeros">
                    </div>
                    <div class="field">
                        <label for="pf-rg">RG</label>
                        <input type="text" name="pf-rg" id="pf-rg" value="{{ old('pf-rg') }}" maxlength="11" placeholder="Apenas numeros">
                    </div>
                    <div class="field">
                        <label for="pf-upload-rg">Upload RG</label>
                        <input type="file" name="pf-upload-rg" id="pf-upload-rg" accept="image/*,.pdf" value="{{ old('pf-upload-rg') }}">
                    </div>
                    <div class="field">
                        <label for="pf-upload-cpf">Upload CPF</label>
                        <input type="file" name="pf-upload-cpf" id="pf-upload-cpf" accept="image/*,.pdf" value="{{ old('pfupload-cpf')}}">
                    </div>
                </div>
        
            </div>
            <div class="separacao transition hidden" id="div-pj">
                <h3>Informações de Cadastro Pessoa Jurídica</h3>

                <div class="field">
                    <label for="pj-nome">Nome completo do representante legal</label>
                    <input type="text" name="pj-nome" id="pj-nome" value="{{ old('pj-nome') }}">
                </div>

                <div class="four fields">
                    <div class="field">
                        <label for="pj-cpf">CPF do Representante Legal</label>
                        <input type="text" name="pjCpf" id="pjCpf" value="{{ old('pjCpf') }}" maxlength="11" placeholder="Apenas numeros">
                    </div>
                    <div class="field">
                        <label for="pj-rg">RG do Representante Legal</label>
                        <input type="text" name="pj-rg" id="pj-rg" value="{{ old('pj-rg') }}" maxlength="11" placeholder="Apenas numeros">
                    </div>
                    <div class="field">
                        <label for="pj-upload-rg">Upload RG do representante legal</label>
                        <input type="file" name="pj-upload-rg" id="pj-upload-rg" accept="image/*,.pdf">
                    </div>
                    <div class="field">
                        <label for="pj-upload-cpf">Upload CPF do representante legal</label>
                        <input type="file" name="pj-upload-cpf" id="pj-upload-cpf" accept="image/*,.pdf">
                    </div>
                </div>

                <div class="three fields">

                </div>
                <div class="two fields">

                    <div class="field">
                        <label for="pj-upload-representacao">Upload Ata de nomeação (Representante Legal) e demais diretores conforme seu estatuto; (Se cabível)</label>
                        <input type="file" name="pj-upload-representacao" id="pj-upload-representacao" accept="image/*,.pdf">
                    </div>

                    <div class="field">
                        <label for="upload-comprovanteResidencia">Upload comprovante de residência atual da sede da pessoa juridica</label>
                        <input type="file" name="upload-comprovanteResidencia" id="upload-comprovanteResidencia" accept=".pdf">
                    </div>
                </div>
                <div class="two fields">
             
                </div>
                <div class="two fields">
                    <div class="field">
                        <label for="pj-upload-contratoSocial">Upload contrato social da empresa</label>
                        <input type="file" name="pj-upload-contratoSocial" id="pj-upload-contratoSocial" accept="image/*,.pdf">
                    </div>
                    <div class="field">
                        <label for="pj-upload-cadastroNacional">Upload Cadastro nacional de pessoa Jurídica</label>
                        <input type="file" name="pj-upload-cadastroNacional" id="pj-upload-cadastroNacional" accept="image/*,.pdf">
                    </div>

                </div>

             


            </div>

            <div class="separacao">
                <h3>Informações de endereço</h3>
                <div class="three fields">
                    <div class="field">
                        <label for="cep">CEP</label>
                        <input type="text" name="cep" id="cep" value="{{ old('cep') }}" maxlength="11" placeholder="Apenas numeros">
                    </div>
                    <div class="field">
                        <label for="endereco">Endereço</label>
                        <input type="text" name="endereco" id="endereco" value="{{ old('endereco') }}">
                    </div>


                    <div class="field">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" id="bairro" value="{{ old('bairro') }}">
                    </div>
                </div>
                <div class="three fields">
                    <div class="field">
                        <label for="cep">Município</label>
                        <input type="text" name="municipio" id="cidade" value="{{ old('municipio') }}">
                    </div>
                    <div class="field">
                        <label for="uf">UF</label>
                        <input type="text" name="uf" id="uf" value="{{ old('uf') }}">
                    </div>

                    <div class="field">
                        <label for="upload-comprovanteResidencia">Upload comprovante de residência </label>
                        <span> *Declaração de terceiros (Conforme o item 6.3 do edital) </span>

                        <input type="file" name="upload-comprovanteResidencia" id="upload-comprovanteResidencia" accept=".pdf">

                    
                    </div>
                </div>
            </div>

            <div class="separacao">
                <h3>Informações de Contato</h3>

                <div class="two fields">
                    <div class="field">
                        <label for="fone1">Telefone 1 (Com DDD - Fixo ou Celular) </label>
                        <input type="text" name="fone1" id="fone1" value="{{ old('fone1') }}" maxlength="11" placeholder="Apenas numeros">
                    </div>

                    <div class="field">
                        <label for="email">E-mail </label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}">
                    </div>
                </div>

            </div>


            <div class="separacao">
                <h3>FOTOS</h3>


                <div class="four fields">

                    
                    <div class="field">
                        <label for="upload-foto1">Upload foto 1</label>
                        <input type="file" name="upload-foto1" id="upload-foto1" accept=".jpg">
                        
                        <label for="distincao-foto1">Distinção foto 1</label>
                        <input type="text" name="distincao-foto1" id="distincao-foto1" value="{{ old('distincao-foto1') }}">
                        
                        <label for="titulofoto1">Título foto 1</label>
                        <input type="text" name="titulofoto1" id="titulofoto1" value="{{ old('titulofoto1') }}">
                    </div>

                    <div class="field">

                            <label for="upload-foto2">Upload foto 2</label>
                            <input type="file" name="upload-foto2" id="upload-foto2" accept=".jpg">

                            <label for="distincao-foto2">Distinção foto 2</label>
                            <input type="text" name="distincao-foto2" id="distincao-foto2" value="{{ old('distincao-foto2') }}">

                            <label for="titulofoto2">Título foto 2</label>
                            <input type="text" name="titulofoto2" id="titulofoto2" value="{{ old('titulofoto2') }}">
                    </div>

                    <div class="field">
                            <label for="upload-foto3">Upload foto 3</label>
                            <input type="file" name="upload-foto3" id="upload-foto3" accept=".jpg">

                            <label for="distincao-foto3">Distinção foto 3</label>
                            <input type="text" name="distincao-foto3" id="distincao-foto3" value="{{ old('distincao-foto3') }}">

                            <label for="titulofoto3">Título foto 3</label>
                            <input type="text" name="titulofoto3" id="titulofoto3" value="{{ old('titulofoto3') }}">
                    </div>

                    <div class="field">
                            <label for="upload-foto4">Upload foto 4</label>
                            <input type="file" name="upload-foto4" id="upload-foto4" accept=".jpg">

                            <label for="distincao-foto4">Distinção foto 4</label>
                            <input type="text" name="distincao-foto4" id="distincao-foto4" value="{{ old('distincao-foto4') }}">

                            <label for="titulofoto4">Título foto 4</label>
                            <input type="text" name="titulofoto4" id="titulofoto4" value="{{ old('titulofoto4') }}">
                    </div>
                </div>
                

    

            </div>
            <br><br>
            <input type="submit" value="Enviar" class="ui blue button ">
            <br><br>
        </form>


    </div>
    <br><br>
    <script>
        $('.ui.dropdown').dropdown();
        $("#pj").change(function() {
            $('#div-pf').transition('zoom');
            setTimeout(function() {
                $('#div-pj').transition('zoom');
            }, 200);
        });
        $("#pf").change(function() {

            $('#div-pj').transition('zoom');
            setTimeout(function() {
                $('#div-pf').transition('zoom');
            }, 100);
        });
    </script>
</body>
<script>
    function TestaCPF(strCPF) {
        var Soma;
        var Resto;
        Soma = 0;
        if (strCPF == "00000000000") return false;

        for (i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11)) Resto = 0;
        if (Resto != parseInt(strCPF.substring(9, 10))) return false;

        Soma = 0;
        for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11)) Resto = 0;
        if (Resto != parseInt(strCPF.substring(10, 11))) return false;
        return true;
    }

    $('#pfCpf').change(function() {
        strCPF = $('#pfCpf').val();
        resp = TestaCPF(strCPF);
        if (resp == false) {
            alert('CPF invalido');
            $('#pfCpf').val('');
        }
    });

    $('#pjCpf').change(function() {
        strCPF = $('#pjCpf').val();
        resp = TestaCPF(strCPF);
        if (resp == false) {
            alert('CPF invalido');
            $('#pjCpf').val('');
        }
    });

</script>

</html>