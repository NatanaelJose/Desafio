@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Categorias</h1>
    <div style="display:flex; flex-direction: row; width: 100%; justify-content: space-between;">
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-4">Criar Nova Categoria</a>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary mb-4">Ver tarefas</a>
    </div>
    <ul class="list-group">
        @foreach($categories as $category)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $category->name }}
                <div class="btn-group" role="group" aria-label="Ações">
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary">Editar</a>
                    <button type="button" class="btn btn-sm btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $category->id }}').submit();">Excluir</button>
                    <form id="delete-form-{{ $category->id }}" action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
