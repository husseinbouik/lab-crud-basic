    @forelse ($tasks as $task)
        <tr>
            <td>{{ $task->id }}</td>
            <td>{{ $task->name }}</td>
            <td>{!! $task->description !!}</td>
            <td class="project-actions text-right">
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-info btn-sm">
                    <i class="fas fa-pencil-alt"></i> Edit
                </a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4">No tasks found</td>
        </tr>
    @endforelse

    <tr>
        <td colspan="4">
            <div class="pagination">
                {{ $tasks->links('pagination::bootstrap-4') }}
            </div>
        </td>
    </tr>

    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <div class="float-left col-md-6 d-flex justify-content-end" style="align-items: center;">
                <button type="button" class="btn btn-default mr-2 swalDefaultQuestion">
                    <i class="fas fa-download"></i> export
                </button>
                <button type="button" class="btn btn-default swalDefaultQuestion">
                    <i class="fas fa-file-import"></i> import
                </button>
            </div>
        </td>
    </tr>
