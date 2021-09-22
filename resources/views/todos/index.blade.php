@extends('layouts.app')

@section('content')
    <div class="row mb-2">
        <div class="col-md-8">
            <h1>Todo List</h1>    
        </div>
        <div class="col-md-2">
            <a href="{{ route('todos.create') }}" class="btn btn-primary m-auto">Create</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
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
                            <td class="d-flex flex-row">
                                <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-success btn-sm mr-2"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $todos->links() }}
        </div>
    </div>
@endsection
