@extends('adminlte::page')

@section('title', 'Novo Plano')

@section('content_header')
    <div class="card">
        <div class="p-2">
            <a href="{{ redirect()->back()->getTargetUrl() }}" class="float-left"><i class="fas fa-angle-left primary mr-3 mr-lg-3 mr-sm-3"> voltar</i></a>
            <h1 class="float-left">Novo Plano</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.store') }}" class="form" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="price">Preço:</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" name="price" id="price" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <input type="text" name="description" id="description" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="reset" class="btn btn-secondary btn-outline-light">
                    <input type="submit" class="btn btn-primary btn-outline-light">
                </div>
            </form>
        </div>
    </div>
@stop

