@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Criar Nova Categoria') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('categories.store') }}">
                        @csrf

                        <div class="form-group" style="margin-bottom:2em;">
                            <label for="name">{{ __('Nome da Categoria') }}:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>

                        <button type="submit" style="margin-right: 1em;" class="btn btn-primary">{{ __('Salvar') }}</button>
                        <button type="button" onclick="history.back()" class="btn btn-secondary">{{ __('Voltar') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
