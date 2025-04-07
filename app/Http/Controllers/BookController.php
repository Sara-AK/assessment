<?php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required|unique:books'
        ]);

        Book::create($request->all());
        return redirect('/');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required|unique:books,isbn,' . $book->id
        ]);

        $book->update($request->all());
        return redirect('/');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/');
    }

   
public function search(Request $request)
{
    $query = $request->input('query');
    $books = Book::where('title', 'like', "%$query%")
                ->orWhere('author', 'like', "%$query%")
                ->orWhere('isbn', 'like', "%$query%")
                ->get();

    return view('books.index', compact('books'));
}
public function checkout(Book $book)
{
    if (!$book->checked_out) {
        $book->update(['checked_out' => true]);
        return redirect()->back()->with('success', 'Book checked out successfully.');
    }
    return redirect()->back()->with('error', 'Book is already checked out.');
}

public function checkin(Book $book)
{
    if ($book->checked_out) {
        $book->update(['checked_out' => false]);
        return redirect()->back()->with('success', 'Book checked in successfully.');
    }
    return redirect()->back()->with('error', 'Book is already available.');
}

}
