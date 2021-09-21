@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Todo List</h1>    
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Description</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($todos as $todo)
                        <tr>
                            <td>{{ $todo->id }}</td>
                            <td>{{ $todo->description }}</td>
                            <td>
                                <a href="#" class="btn btn-success btn-sm mb-2">Check</a>
                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
