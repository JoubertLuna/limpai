@extends('adminlte::page')

@section('title', 'Limpa ai')

@section('content_header')
    <a href="{{ route('user.create') }}" class="btn btn-dark"><i class="fas fa-plus-circle"></i> Cadastrar novo
        Usuário</a>
@stop

@section('content')

    @include('Limpai.Painel.includes.alerts')

    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nome</th>
                        <th class="esc">E-mail</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td align="center">
                                @if ($user->image)
                                    <img src="{{ asset('storage/users/' . $user->image) }}" width="50px"
                                        alt="{{ $user->name }}">
                                @else
                                    <img src="{{ asset('storage/users/default.jpg') }}" width="50px">
                                @endif
                            </td>
                            <td>{{ $user->name }}</td>
                            <td class="esc">{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('user.show', $user->id) }}" title="Detalhes do Usuário"><i
                                        class="fas fa-list text-dark"></i></a>

                                <a href="{{ route('user.edit', $user->id) }}" title="Editar Dados"><i
                                        class="fa fa-edit text-primary"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@stop

@section('css')
    <style>
        @media screen and (max-width: 480px) {
            .esc {
                display: none;
            }
        }
    </style>
@stop
