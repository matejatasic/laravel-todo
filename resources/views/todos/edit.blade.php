@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Task</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('todos.update', $todo->id) }}">
                            @csrf

                            <div class="form-group p-2 row">
                                <label>Description</label>
                                
                                <textarea name="description" class="form-control" cols="30" rows="5">{{ $todo->description }}</textarea>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-5">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
