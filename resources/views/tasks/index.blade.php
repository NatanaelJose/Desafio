@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Tarefas</h1>
    <div style="display:flex; flex-direction: row; width: 100%; justify-content: space-between;">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-4">Criar Nova Tarefa</a>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary mb-4">Ver Categorias</a>
    </div>
    
    @foreach($categories as $category)
        <div class="card mb-4">
            <div class="card-header">{{ $category->name }}</div>
            <ul class="list-group list-group-flush">
                @foreach($category->tasks as $task)
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>{{ $task->name }}</span>
                            <div class="btn-group" role="group" aria-label="Ações">
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                <button type="button" class="btn btn-sm btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $task->id }}').submit();">Excluir</button>
                                <form id="delete-form-{{ $task->id }}" action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
@endsection
