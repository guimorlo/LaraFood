@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <div class="card">
        <div class="p-2">
            <h1 class="float-left">Planos</h1>
            <a href="{{ route('plans.create') }}" class="btn btn-dark btn-outline-primary float-left ml-4 float-xl-left"><i class="fas fa-plus-circle"></i> Novo Plano</a>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header p-0">
            <nav class="navbar navbar-expand-lg navbar-blue blue lighten-2">
                <form action="{{ route('plans.search') }}" class="form-inline mr-auto" method="POST">
                    @csrf
                    <input class="form-control" type="text" name="key" value="{{ $key ?? "" }}" placeholder="Busca" aria-label="Busca" required>
                    <input type="hidden" name="filter" id="filter">
                    <div class="dropdown ml-2 ml-sm-2" title="Selecione algum filtro">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filtros
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <button class="dropdown-item" type="button" onclick="$('#filter').val('id'); $('#dropdownMenu').text('Código')">Código</button>
                            <button class="dropdown-item" type="button" onclick="$('#filter').val('price'); $('#dropdownMenu').text('Preço')">Preço</button>
                            <button class="dropdown-item" type="button" onclick="$('#filter').val('name'); $('#dropdownMenu').text('Nome')">Nome</button>
                            <button class="dropdown-item" type="button" onclick="$('#filter').val('description'); $('#dropdownMenu').text('Descrição')">Descrição</button>
                        </div>
                    </div>
                    <button class="btn btn-secondary btn-rounded btn-sm my-0 ml-sm-2 ml-2" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </nav>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                    <th scope="col" width="80">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($plans as $plan)
                    <tr>
                        <th scope="row">
                            {{ $plan->id ?? "" }}
                        </th>
                        <td>
                            {{ $plan->name ?? "" }}
                        </td>
                        <td>
                            R$ {{ number_format($plan->price ?? "", 2, ',', '.') }}
                        </td>
                        <td>
                            <a href="{{ route('plans.show', [ 'url' => $plan->url]) }}" class="btn btn-primary btn-outline-light"><i class="fas fa-arrow-circle-right"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {!! $plans->links() !!}
        </div>
    </div>
@stop
