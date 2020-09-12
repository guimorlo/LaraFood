@extends('adminlte::page')

@section('title', $plan->name ?? 'erro ao buscar nome')

@section('content_header')
    <div class="card">
        <div class="p-2">
            <a href="{{ redirect()->back()->getTargetUrl() }}" class="float-left mr-3 mr-lg-3 mr-sm-3"><i class="fas fa-angle-left primary "></i> voltar</a>
            <h1 class="float-left">Detalhes <b>{{ $plan->name ?? 'erro ao buscar nome' }}</b></h1>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th colspan="4">INFORMAÇÕES DO PLANO</th>
                    </tr>
                </thead>
                <tbody class="w-75">
                    <tr>
                        <td><i class="fas fa-hashtag" title="Código"></i></td>
                        <td>{{ $plan->id ?? "" }}</td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-signature" title="Nome"></i></td>
                        <td>{{ $plan->name ?? "" }}</td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-dollar-sign" title="Preço"></i></td>
                        <td>R$ {{ number_format($plan->price ?? "", 2, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-link" title="URL"></i></td>
                        <td><a href="{{ $plan->url ?? "" }}">{{ $plan->url ?? "" }}</a></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-comment-dots" title="Descrição"></i></td>
                        <td>{{ $plan->description ?? "" }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <form action="{{ route('plans.destroy', $plan->url) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-outline-warning" title="Excluir plano" type="submit"><i class="fas fa-trash-alt"></i></button>
            </form>
        </div>
    </div>
@stop

