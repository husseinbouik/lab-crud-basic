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
use App\Repository\TaskRepository;
use App\Models\Task;
class TaskController extends Controller
{ public function index(Request $request)
    {
        // Retrieve tasks directly from the Task model
        $tasks = Task::paginate(5); // Adjust the pagination limit as needed
    
        if ($request->ajax()){
            $searchTasks = $request->get('searchTasks');
            $searchTasks = str_replace(" ", "%", $searchTasks);
    
            $tasks = Task::where(function ($query) use ($searchTasks) {
                $query->where('name', 'like', '%' . $searchTasks . '%')
                    ->orWhere('description', 'like', '%' . $searchTasks . '%');
            })
                ->paginate(3);
    
            return view('blog.search', compact('tasks'))->render();
        }
    
        return view('blog.index', compact('tasks'));
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
