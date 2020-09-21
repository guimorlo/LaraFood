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
                    @isset($plan->description)
                        <tr>
                            <td><i class="fas fa-comment-dots" title="Descrição"></i></td>
                            <td>{{ $plan->description ?? "" }}</td>
                        </tr>
                    @endisset
                </tbody>
                <thead class="thead-dark">
                <tr class="text-center">
                    <th colspan="4">DETALHES <a href="{{ route('plans.details.create', $plan->url) }}" class="btn btn-primary btn-outline-light float-right py-0" title="Cadastrar novo detalhe"><i class="fas fa-plus-circle"></i></a></th>
                </tr>
                </thead>
            </table>
                @if(isset($details) && (sizeof($details) > 0))
                <div class="accordion" id="accordionDetails">
                        @foreach($details as $detail)
                            <div class="card mb-0">
                                <div class="card-header p-0" id="heading{{ $detail->id ?? "null" }}">
                                    <h2 class="mb-0">
                                        <button type="button" class="btn btn-link w-100 text-left p-3 text-bold" data-toggle="collapse" data-target="#collapse{{ $detail->id ?? "null" }}">
                                            {{ $detail->name ?? "null" }} <i class="fas fa-chevron-down float-right"></i></button>
                                    </h2>
                                </div>
                                <div id="collapse{{ $detail->id ?? "null" }}" class="collapse" aria-labelledby="heading{{ $detail->id ?? "null"}}" data-parent="#accordionDetails">
                                    <div class="card-body">
                                        <p>{{ $detail->description ?? "null" }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <form class="float-left" action="" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-secondary btn-outline-light" title="Excluir detalhe" type="submit"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                        <button class="float-left ml-3 btn btn-secondary btn-outline-light" title="Editar detalhe" onclick="window.location.href=''"><i class="fas fa-pen"></i></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                </div>
                @else
                <div class="card text-center p-3">
                    <h4>
                        Não há detalhes cadastrados!
                    </h4>
                </div>
                @endif
        </div>
        <div class="card-footer">
            <form class="float-left" action="{{ route('plans.destroy', $plan->url) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-outline-warning" title="Excluir plano" type="submit"><i class="fas fa-trash-alt"></i></button>
            </form>
            <button class="float-left ml-3 btn btn-warning btn-outline-dark" title="Editar este plano" onclick="window.location.href='{{ route('plans.edit', $plan->url) }}'"><i class="fas fa-pen"></i></button>
        </div>
    </div>
@stop

