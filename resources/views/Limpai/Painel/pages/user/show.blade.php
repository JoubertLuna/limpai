@extends('adminlte::page')

@section('title', 'Detalhes do Usuário')

@section('content_header')
    <div align="left">
        <h1>Detalhes do Usuário <b>{{ $user->name }}</b></h1>
    </div>
    <div align="right">
        <a href="{{ route('user.index') }}" class="btn btn-dark">Voltar</a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5><b>Dados Gerais</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>Usuário: </strong> {{ $user->name }}
                        </li>
                        <li>
                            <strong>CPF: </strong> {{ $user->cpf }}
                        </li>
                        <li>
                            <strong>RG: </strong> {{ $user->rg }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><b>Contatos</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>Telefone: </strong> {{ $user->fone }}
                        </li>
                        <li>
                            <strong>Celular: </strong> {{ $user->celular }}
                        </li>
                        <li>
                            <strong>E-mail: </strong> {{ $user->email }}
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h5><b>Endereço</b></h5>
                    <hr>
                    <ul>
                        <li>
                            <strong>CEP: </strong> {{ $user->cep }}
                        </li>
                        <li>
                            <strong>Logradouro: </strong> {{ $user->logradouro }}
                        </li>
                        <li>
                            <strong>Bairro: </strong> {{ $user->bairro }}
                        </li>
                        <li>
                            <strong>Cidade: </strong> {{ $user->cidade }}
                        </li>
                        <li>
                            <strong>Estado: </strong> {{ $user->uf }}
                        </li>
                        <li>
                            <strong>Número: </strong> {{ $user->numero }}
                        </li>
                        <li>
                            <strong>Complemento: </strong> {{ $user->complemento }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5><b>Imagem</b></h5>
                    <hr>
                    <div align="center" class="form-group">
                        @if (@$user->image)
                            <img src="{{ asset('storage/users/' . @$user->image) }}" width="180px"
                                alt="{{ @$user->name }}">
                        @else
                            <img src="{{ asset('storage/users/default.jpg') }}" width="180px">
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            @include('Limpai.Painel.includes.alerts')
            <div class="form-group">
                <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" title="Deletar Usuário - {{ $user->nome }}" class="btn btn-sm btn-dark"
                        width="150"><i class="fa fa-trash text-danger"></i>
                        Deletar Usuário - {{ $user->name }}</button>
                </form>
            </div>
        </div>
    </div>
@stop
