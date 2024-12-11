<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;

class Books extends Component
{
    public $books, $title, $author, $quantity, $book_id;

    public function render()
    {
        $this->books = Book::all();
        return view('livewire.books')->layout('layouts.app');
    }

    public function create()
    {
        // Uncomment to debug
        // dd($this->title, $this->author, $this->quantity);

        $this->validate([
            'title' => 'required|string|max:50',
            'author' => 'required|string|max:50',
            'quantity' => 'required|integer|min:1',
        ]);

        Book::create([
            'title' => $this->title,
            'author' => $this->author,
            'quantity' => $this->quantity,
        ]);

        session()->flash('message', 'Book created successfully.');
        $this->resetForms();
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $this->book_id = $book->id;
        $this->title = $book->title;
        $this->author = $book->author;
        $this->quantity = $book->quantity;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|string|max:50',
            'author' => 'required|string|max:50',
            'quantity' => 'required|integer|min:1',
        ]);

        $book = Book::findOrFail($this->book_id);
        $book->update([
            'title' => $this->title,
            'author' => $this->author,
            'quantity' => $this->quantity,
        ]);

        session()->flash('message', 'Book updated successfully.');
        $this->resetForms();
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        session()->flash('message', 'Book deleted successfully.');
    }

    public function resetForms()
    {
        $this->title = '';
        $this->author = '';
        $this->quantity = '';
        $this->book_id = null;
    }
}
