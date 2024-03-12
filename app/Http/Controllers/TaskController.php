<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        $categories = Category::with('tasks')->get();

        return view('tasks.index', compact('tasks', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('tasks.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
    
        $task = new Task([
            'name' => $request->input('name'),
            'user_id' => $user->id,
            'category_id' => $request->input('category_id')
        ]);
        
        $task->save();
    
        return redirect()->route('tasks.index');
    }
    

    public function edit(Task $task)
    {
        $categories = Category::all();
        return view('tasks.edit', compact('task', 'categories'));
    }

    public function update(Request $request, Task $task)
    {
        $task->update([
            'name' => $request->input('name')
        ]);

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        
        return redirect()->route('tasks.index');
    }
}
