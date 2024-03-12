@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Criar Nova Tarefa') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tasks.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">{{ __('Nome da Tarefa') }}:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>

                        <div class="form-group" style="margin-bottom: 2em;">
                            <label for="category_id">{{ __('Categoria') }}:</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" style="margin-right: 1em;" class="btn btn-primary">{{ __('Salvar') }}</button>
                        <button type="button" onclick="history.back()" class="btn btn-secondary">{{ __('Voltar') }}</button>                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
