@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">✏️ Edit Book</h1>

    <div class="card shadow p-4">
        <form action="/books/{{ $book->id }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" value="{{ $book->title }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Author</label>
                <input type="text" name="author" value="{{ $book->author }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">ISBN</label>
                <input type="text" name="isbn" value="{{ $book->isbn }}" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success w-100">✅ Update Book</button>
        </form>
    </div>
</div>
@endsection
