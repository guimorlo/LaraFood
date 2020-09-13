@extends('adminlte::page')

@section('title', $plan->name ?? "" )

@section('content_header')
    <div class="card">
        <div class="p-2">
            <a href="{{ redirect()->back()->getTargetUrl() }}" class="float-left"><i class="fas fa-angle-left primary mr-3 mr-lg-3 mr-sm-3"> voltar</i></a>
            <h1 class="float-left">{{ $plan->name ?? "" }}</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.update', $plan->url) }}" class="form" method="POST">
                @csrf
                @method('PUT')
                <table class="table">
                    <thead class="thead-dark">
                    <tr class="text-center">
                        <th colspan="4">EDIÇÃO DE PLANO #{{ $plan->id ?? "" }}</th>
                    </tr>
                    </thead>
                    <tbody class="w-75">
                    <tr>
                        <th style="width: 10px"><i class="fas fa-signature" title="Nome"></i></th>
                        <td class="form-group">
                            <input class="form-control" name="name" type="text" value="{{ $plan->name ?? "" }}">
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 10px"><i class="fas fa-dollar-sign" title="Preço"></i></th>
                        <td class="form-group">
                            <input class="form-control form-control-range" name="price" type="number" value="{{ $plan->price ?? "" }}">
                        </td>
                    </tr>
                    <tr>
                        <th style="width: 10px"><i class="fas fa-comment-dots" title="Descrição"></i></th>
                        <td class="form-group">
                            <textarea  class="form-control swal2-textarea" name="description" type="text" >{{ $plan->description ?? "" }}</textarea>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-outline-light">
                </div>
            </form>
        </div>
    </div>
@stop

