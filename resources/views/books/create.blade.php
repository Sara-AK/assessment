@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Add New Book</h2>

    <div class="card shadow-sm p-4">
        <form action="/books" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Author</label>
                <input type="text" name="author" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">ISBN</label>
                <input type="text" name="isbn" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Book</button>
            <a href="/books" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
