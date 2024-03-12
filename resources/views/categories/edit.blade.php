@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Categoria') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('categories.update', $category->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group" style="margin-bottom:2em;" >
                            <label for="name">{{ __('Nome da Categoria') }}:</label>
                            <input type="text" id="name" name="name" value="{{ $category->name }}" class="form-control">
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
