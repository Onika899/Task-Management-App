@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Manage Priorities</h1>
        <a href="{{ route('priorities.create') }}" class="btn btn-primary">Add New Priority</a>
    </div>

    <div class="card">
        <div class="card-body">
            @if ($priorities->count() > 0)
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Priority Name</th>
                            <th>Level</th>
                            <th>Task Count</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($priorities as $priority)
                            <tr>
                                <td>{{ $priority->id }}</td>
                                <td>
                                    <span
                                        class="badge bg-{{ $priority->level >= 4 ? 'danger' : ($priority->level >= 3 ? 'warning' : 'info') }}">
                                        {{ $priority->name }}
                                    </span>
                                </td>
                                <td>
                                    <div class="progress" style="height: 20px; width: 100px;">
                                        <div class="progress-bar bg-{{ $priority->level >= 4 ? 'danger' : ($priority->level >= 3 ? 'warning' : 'info') }}"
                                            style="width: {{ ($priority->level / 5) * 100 }}%;">
                                            {{ $priority->level }}/5
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $priority->tasks->count() }} tasks</td>
                                <td>{{ $priority->created_at->format('M d, Y') }}</td>
                                <td>
                                    <a href="{{ route('priorities.edit', $priority) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('priorities.destroy', $priority) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Delete this priority?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center">No priorities found. <a href="{{ route('priorities.create') }}">Create one</a></p>
            @endif
        </div>
    </div>
@endsection
