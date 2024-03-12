@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Tarefa') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">{{ __('Nome da Tarefa') }}:</label>
                            <input type="text" id="name" name="name" value="{{ $task->name }}" class="form-control">
                        </div>

                        <div class="form-group" style="margin-bottom:2em;">
                            <label for="category_id">{{ __('Categoria') }}:</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if($task->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" style="margin-right:1em;"  class="btn btn-primary">{{ __('Salvar') }}</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">{{ __('Cancelar') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
