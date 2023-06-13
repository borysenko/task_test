@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Show todo #{{$todo->id}}</div>

                <div class="card-body">
                    <form action="{{ route('todo.destroy', $todo->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('todo.edit', $todo->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" @if($todo->status == 'done') disabled @endif class="btn btn-danger">Delete</button>
                    </form>
                    <h1>{{ $todo->title ?? 'Not translate' }}</h1>
                    <p>{{ $todo->description ?? 'Not translate' }}</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
