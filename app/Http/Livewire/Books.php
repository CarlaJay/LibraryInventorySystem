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
    if ($this->books->isEmpty()) {
        // Return a default value if no books are found
        $this->books = collect();
    }
    return view('livewire.books')->layout('layouts.app');
}


    public function create()
    {
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
        $book = Book::find($id);
        $this->book_id = $book->id;
        $this->title = $book->title;
        $this->author = $book->author;
        $this->quantity = $book->quantity;
    }

    public function update()
    {
        $book = Book::find($this->book_id);
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
        Book::find($id)->delete();
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

