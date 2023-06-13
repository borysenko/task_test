<?php

namespace App\Repositories;

use App\Models\Todo;
use App\Repositories\Interfaces\TodoRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class TodoRepository implements TodoRepositoryInterface
{
    public function allTodo()
    {
        $todo = Auth::user()->todo();
        if(request()->has('title') && request('title'))
        {
            $todo->where('title', 'like', '%'.request('title').'%');
        }else {
            $todo->where(['parent_id' => null]);
        }

        $todo->sort();

        return $todo->paginate(5);
    }

    public function storeTodo($data)
    {
        return Auth::user()->todo()->create($data);
    }

    public function findTodo($id)
    {
        return Auth::user()->todo()->find($id);
    }

    public function updateTodo($data, $id)
    {
        $Todo = Auth::user()->todo()->where('id', $id)->first();
        $Todo->fill($data)->save();
    }

    public function destroyTodo($id)
    {
        $Todo = Auth::user()->todo()->whereNot('status', 'done')->find($id);
        if($Todo) {
            $Todo->delete();
        }
    }
}
