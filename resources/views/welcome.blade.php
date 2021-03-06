@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Welcome!</h1>
            <p>This is a simple Laravel Todo app. With it you will be able to make a todo list, create, edit and delete tasks. Click the button below to start making your todo list.</p>
            <p><a class="btn btn-primary btn-lg" href="{{ route('todos.index') }}" role="button">Start &#62;</a></p>
        </div>
    </div>
@endsection
