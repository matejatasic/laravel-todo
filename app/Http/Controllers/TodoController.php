<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Todo;
use Session;

class TodoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $todos = $user->todos()->paginate(5);

        return view('todos.index')->with('todos', $todos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required|max:255',
        ]);

        $todo = new Todo;
        $user = Auth::user();
        $todos = $user->todos()->paginate(5);

        $todo->description = $request->description;
        $todo->user_id = Auth::id();
        $todo->save();

        Session::flash('success', 'Task successfully added!');

        return redirect()->route('todos.index')->with('todos', $todos);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);

        if($todo->user_id !== Auth::id()) {
            Session::flash('error', 'You are not allowed to edit this task!');
            return redirect('/');
        }
        else {
            return view('todos.edit')->with('todo', $todo);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'description' => 'required|max:255',
        ]);

        $todo = Todo::find($id);
        $user = Auth::user();
        $todos = $user->todos()->paginate(5);

        $todo->description = $request->description;
        $todo->save();

        Session::flash('success', 'Task successfully updated!');

        return redirect()->route('todos.index')->with('todos', $todos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        $user = Auth::user();
        $todos = $user->todos()->paginate(5);
        $todo->delete();

        Session::flash('success', 'Task successfully deleted!');
        
        return redirect()->route('todos.index')->with('todos', $todos);
    }
}
