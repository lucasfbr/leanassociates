@extends('layouts.email.default')

@section('content')

    <h4>Mensagem enviaada pelo formulário de contato</h4>
    <p><strong>Empresa:</strong></p>
    <p>{{$dados['empresa']}}</p>
    <p><strong>Contato:</strong></p>
    <p>{{$dados['nome']}}</p>
    <p><strong>Email:</strong></p>
    <p>{{$dados['email']}}</p>
    <p><strong>Telefone:</strong></p>
    <p>{{$dados['fone']}}</p>
    <p><strong>Mensagem:</strong></p>
    <p>{{$dados['mensagem']}}</p>

@endsection