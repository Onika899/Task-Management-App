@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Manage Categories</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Add New Category</a>
    </div>

    <div class="card">
        <div class="card-body">
            @if ($categories->count() > 0)
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Task Count</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->tasks->count() }} tasks</td>
                                <td>{{ $category->created_at->format('M d, Y') }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', $category) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Delete this category?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center">No categories found. <a href="{{ route('categories.create') }}">Create one</a></p>
            @endif
        </div>
    </div>
@endsection
