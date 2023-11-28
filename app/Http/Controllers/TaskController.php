<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Pagination\Paginator;
use App\Http\Requests\FormPostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Validator;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Http\Requests\FormTaskRequest;
use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
    
    // public function index(Request $request, Task $task) {
    //     $search = $request->input('search');
    
    //     // $tasks = Task::all();
    
    //     if ($search) {
    //         $query = Task::where('name', 'LIKE', '%' . $search . '%')
    //             ->orWhere('description', 'LIKE', '%' . $search . '%');
    
    //         $tasks = $query->paginate(2);
    //     } else {
    //         // dd($tasks);
    //         Task::get()->paginate(2); // Paginate even if no search
    //     }
    
    //     return view('blog.index', compact('task', 'search'));
    // }

 
    public function index(Request $request)
    {
        $search = $request->input('search');
        $tasksPerPage = 2;
    
        $query = Task::query();
    
        if ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%')
                  ->orWhere('description', 'LIKE', '%' . $search . '%');
        }
    
        $tasks = $query->paginate($tasksPerPage);
    
        if ($request->ajax()) {
            return view('blog.tasks', compact('tasks', 'search'))->render();
        }
    
        return view('blog.index', compact('tasks', 'search'));
    }
    
    

    

    public function create()
    {
        // Return a view to create a new task
        return view('blog.create');
    }

    public function store(FormTaskRequest $request, Task $task)
    {
  
     // 1. Validation
     $validatedData = $request->validated();

     // 2. Create the Task
     $task->create($validatedData);
 
     // 3. Redirect with Success Message
     return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }


    public function show(Task $task)
    {
        // Show details of a specific task
        // Return a view with the task details
    }

    public function edit(Task $task)
    {
        // Return a view to edit the specified task
        return view('blog.edit', ['task' => $task]);
    }

    public function update(FormTaskRequest $request, Task $task)
    {

     // 1. Validation
     $validatedData = $request->validated();

     // 2. Update the Task
     $task->update($validatedData);
 
     // 3. Redirect with Success Message
     return redirect()->route('tasks.index')->with('success', 'Task updated successfully');}

    public function destroy(Task $task)
    {
        $task->delete();
 
        // 3. Redirect with Success Message
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
}
