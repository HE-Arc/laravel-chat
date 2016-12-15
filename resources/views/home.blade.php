@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-block">
                    <h2 class="card-title">Dashboard</h2>

                    <p class="cart-text">
                        You are logged in!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<chat v-bind:messages="messages"></chat>
@endsection
