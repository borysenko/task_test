@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ToDo</div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <a href="{{route('todo.create')}}" class="btn btn-success">Create todo</a>
                        <br /><br />
                        <div class="todo">
                            <form method="get" action="{{route('todo.index')}}">
                                <div class="row">
                                    <div class="col-md-4">
                                    <input type="text" class="form-control"  name="title" value="{{request()->title}}" />
                                    </div>
                                    <div class="col-md-4">
                                    <select name="sort" class="form-control">
                                        <option value=""></option>
                                        <option value="status" @if(request()->sort == 'status') selected @endif>статус</option>
                                        <option value="priority" @if(request()->sort == 'priority') selected @endif>Пріоритет</option>
                                        <option value="created_at" @if(request()->sort == 'created_at') selected @endif>за часом створення</option>
                                    </select>
                                    </div>
                                        <div class="col-md-3"><input type="submit" class="btn btn-info" value="Поиск / сорт."></div>
                                </div>
                            </form><br />
                            @foreach ($todo as $item)
                                @include('todo._todo')
                                @if(!request()->title)
                                    @include('todo._tree', ['parent' => $item->parent])
                                @endif
                                <hr />
                            @endforeach
                        </div>

                        {{ $todo->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
