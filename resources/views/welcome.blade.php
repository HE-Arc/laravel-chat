@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-block">
                    <h2 class="card-title h4">Laravel</h2>
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="https://laravel.com/docs">Documentation</a></li>
                    <li class="list-group-item"><a href="https://laracasts.com">Laracasts</a></li>
                    <li class="list-group-item"><a href="https://laravel-news.com">News</a></li>
                    <li class="list-group-item"><a href="https://forge.laravel.com">Forge</a></li>
                    <li class="list-group-item"><a href="https://github.com/laravel/laravel">GitHub</a></li>
                </ul>

                <div class="card-block">
                    {{-- // Handlebar template --}}
                    @include("test", ["name" => "From Blade"])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
