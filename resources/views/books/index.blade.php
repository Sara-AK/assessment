@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">📚 Library Management</h1>

    <!-- Search Form -->
    <div class="mb-4">
        <form action="{{ route('books.search') }}" method="GET" class="d-flex align-items-center">
            <input type="text" name="query" class="form-control me-2" placeholder="🔍 Search books..." required>
            <button type="submit" class="btn btn-outline-primary">Search</button>
        </form>
    </div>

    <!-- Add Book Button -->
    <div class="d-flex justify-content-between mb-3">
        <a href="/books/create" class="btn btn-primary">➕ Add New Book</a>
    </div>

    <!-- Books Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>ISBN</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>
                        <span class="badge {{ $book->checked_out ? 'bg-danger' : 'bg-success' }}">
                            {{ $book->checked_out ? 'Checked Out' : 'Available' }}
                        </span>
                    </td>
                    <td class="d-flex justify-content-center">
                        <!-- Edit Button -->

                        <a href="/books/{{ $book->id }}/edit" class="btn btn-warning btn-sm me-1">✏️ Edit</a>

                        <!-- Delete Form -->
                        <form action="/books/{{ $book->id }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm me-1" onclick="return confirm('Are you sure?')">🗑 Delete</button>
                        </form>

                        <!-- Check-in/Check-out Form -->
                        <form action="/books/{{ $book->id }}/{{ $book->checked_out ? 'checkin' : 'checkout' }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-secondary btn-sm">
                                {{ $book->checked_out ? '🔄 Check In' : '📤 Check Out' }}
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No books found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
