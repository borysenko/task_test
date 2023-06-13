<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoPostRequest;
use App\Models\Todo;
use App\Repositories\Interfaces\TodoRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class ToDoController extends Controller
{
    private $todoRepository;

    public function __construct(TodoRepositoryInterface $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todo = $this->todoRepository->allTodo();
        return view('todo.index', compact('todo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoPostRequest $request)
    {
        $validated = $request->validated();

        $this->todoRepository->storeTodo($request->post());
        return redirect()->route('todo.index')->with('success','todo has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return view('todo.show',compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = $this->todoRepository->findTodo($id);
        return view('todo.edit',compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(TodoPostRequest $request, $id)
    {
        $request->validate([
            'status' => ['required', new \App\Rules\Todo($id)],
        ]);

        $this->todoRepository->updateTodo($request->all(), $id);
        return redirect()->route('todo.index')->with('success','todo Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->todoRepository->destroyTodo($id);
        return redirect()->route('todo.index')->with('success','todo has been deleted successfully');
    }
}
