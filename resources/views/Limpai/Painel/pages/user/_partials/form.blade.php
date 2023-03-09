@include('Limpai.Painel.includes.alerts')
@csrf
<div class="form-group">
    <h4><b>Usuários</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nome do Usuário:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nome do Usuário"
                    value="{{ $user->name ?? old('name') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>E-mail do Usuário:</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="E-mail do Usuário"
                    value="{{ $user->email ?? old('email') }}" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Senha do Usuário:</label>
                <input type="password" name="password" id="password" class="form-control"
                    placeholder="Senha do Usuário" value="{{ old('password', '') }}" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Confirmar Senha do Usuário:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                    placeholder="Confirmar Senha do Usuário" value="{{ old('password_confirmation', '') }}" required>
            </div>
        </div>
    </div>
    <hr>
    <h4><b>Documento / Contato</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>CPF:</label>
                <input type="text" name="cpf" id="cpf" class="form-control mascara-cpf"
                    placeholder="XXX.XXX.XXX-XX" value="{{ $user->cpf ?? old('cpf') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>RG:</label>
                <input type="text" name="rg" id="rg" class="form-control mascara-rg"
                    placeholder="XX.XXX-XX" value="{{ $user->rg ?? old('rg') }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Contato Telefone:</label>
                <input type="text" name="fone" id="fone" class="form-control mascara-fone"
                    placeholder="(00) 0000-0000" value="{{ $user->fone ?? old('fone') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Contato Celular:</label>
                <input type="text" name="celular" id="celular" class="form-control mascara-celular"
                    placeholder="(00) 00000-0000" value="{{ $user->celular ?? old('celular') }}">
            </div>
        </div>
    </div>
    <hr>
    <h4><b>Endereço</b></h4>
    <hr>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label>CEP:</label>
                <input type="text" name="cep" id="cep" class="form-control mascara-cep busca_cep"
                    placeholder="00.000-000" value="{{ $user->cep ?? old('cep') }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Logradouro:</label>
                <input type="text" name="logradouro" id="logradouro" class="form-control rua"
                    placeholder="Digite o Logradouro" value="{{ $user->logradouro ?? old('logradouro') }}">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Bairro:</label>
                <input type="text" name="bairro" id="bairro" class="form-control bairro"
                    placeholder="Digite o Bairro" value="{{ $user->bairro ?? old('bairro') }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>Número:</label>
                <input type="text" name="numero" id="numero" class="form-control" placeholder="Digite o Número"
                    value="{{ $user->numero ?? old('numero') }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Cidade:</label>
                <input type="text" name="cidade" id="cidade" class="form-control cidade"
                    placeholder="Digite a Cidade" value="{{ $user->cidade ?? old('cidade') }}">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>Estado:</label>
                <input type="text" name="uf" id="uf" class="form-control estado"
                    placeholder="EX: PB" value="{{ $user->uf ?? old('uf') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Complemento:</label>
                <input type="text" name="complemento" id="complemento" class="form-control complemento"
                    placeholder="Digite o Complemento" value="{{ $user->complemento ?? old('complemento') }}">
            </div>
        </div>
    </div>
    <hr>
    <h4><b>Imagem do Usuário</b></h4>
    <hr>
    <div class="row">
        <div class="col-lg-7">
            <div class="btn-group w-100">
                <span class="btn btn-dark col fileinput-button">
                    <span>
                        <input type="file" name="image" id="image" class="form-control-file"
                            onchange="pegaArquivo(this.files)" value="{{ $product->image ?? old('image') }}">
                    </span>
                </span>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="form-group">
                @if (@$user->image)
                    <img src="{{ asset('storage/users/' . @$user->image) }}" width="180px"
                        alt="{{ @$user->name }}" id="imgup">
                @else
                    <img src="{{ asset('storage/users/default.jpg') }}" width="180px" id="imgup">
                @endif
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark"><i class="fas fa-save"></i> Cadastrar Usuário</button>
</div>

@section('js')
    <script>
        function pegaArquivo(files) {
            var file = files[0];
            const fileReader = new FileReader();
            fileReader.onloadend = function() {
                $("#imgup").attr("src", fileReader.result);
            }
            fileReader.readAsDataURL(file);
        }
    </script>

    <script src="{{ asset('limpai/painel/jquery.js') }}"></script>
    <script src="{{ asset('limpai/painel/js.js') }}"></script>
    <script src="{{ asset('limpai/painel/jquery.mask.js') }}"></script>
    <script src="{{ asset('limpai/painel/componentes/js_mascara.js') }}"></script>
@stop
