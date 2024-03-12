<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;

use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $tasks = Task::where('user_id', $user->id)->get();
        $categories = Category::with('tasks')->where('user_id', $user->id)->get();

        return view('tasks.index', compact('tasks', 'categories'));
    }


    public function create()
    {
        $user = Auth::user();
        $categories = Category::where('user_id', $user->id)->get();
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
