@foreach ($tasks as $task)
<tr>
    <td>{{ $task->id }}</td>
    <td>{{ $task->name }}</td>
    <td>{!! $task->description !!}</td>
    <td class="project-actions text-right">
        <a class="btn btn-info btn-sm"
            href="{{ route('tasks.edit', $task->id) }}">
            <i class="fas fa-pencil-alt"></i> Edit
        </a>
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
            style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm"
                onclick="return confirm('Are you sure?')">
                <i class="fas fa-trash"></i> Delete
            </button>
        </form>
    </td>

</tr>
@endforeach
