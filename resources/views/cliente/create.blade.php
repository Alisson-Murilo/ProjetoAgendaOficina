@extends('layouts.app')
 
@section('title', 'Novo Cliente')
 
@section('content')
 
<div class="page-header">
    <h1 class="h3 mb-0"><i class="bi bi-people-fill text-primary"></i> Novo Cliente</h1>
    <a href="{{ route('cliente.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Voltar
    </a>
</div>
 
<div class="card page-card">
    <div class="card-body">


        <form action="/cliente" method="post">
            @csrf

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" required="">
            </div>

            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" id="telefone" name="telefone" class="form-control" required="">
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>
 
@endsection
