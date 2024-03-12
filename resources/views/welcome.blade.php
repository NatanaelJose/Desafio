<!-- welcome.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bem-vindo') }}</div>

                <div class="card-body">
                    @if (Route::has('login'))
                        <div class="mb-3">
                            @auth
                                <a href="{{ url('/home') }}" class="btn btn-primary">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-link">Registrar</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
