@extends('adminlte::page')

@section('title', 'Novo Plano')

@section('content_header')
    <div class="card">
        <div class="p-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
                <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name ?? "plano" }}</a></li>
                <li class="breadcrumb-item"><a class="text-gray" href="{{ route('plans.details.create', $plan->url) }}">Novo Detalhe</a></li>
            </ol>
            <a href="{{ redirect()->back()->getTargetUrl() }}" class="float-left"><i class="fas fa-angle-left primary mr-3 mr-lg-3 mr-sm-3"> voltar</i></a>
            <h1 class="float-left">Novo Detalhe</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.details.store', $plan->url) }}" class="form" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Plano: </label>
                    <input type="text" name="plan" id="plan" class="form-control" value="{{ $plan->name ?? "" }}" disabled>
                </div>
                <div class="form-group">
                    <label for="price">Nome:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? "" }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <textarea  class="form-control swal2-textarea" name="description" type="text" >{{ old('description') ?? "" }}</textarea>
                </div>
                <div class="form-group">
                    <input type="reset" class="btn btn-secondary btn-outline-light">
                    <input type="submit" class="btn btn-primary btn-outline-light">
                </div>
            </form>
        </div>
    </div>
@stop

