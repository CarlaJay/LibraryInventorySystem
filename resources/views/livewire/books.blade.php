@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="mb-4">
            <input type="text" wire:model="title" class="form-control mb-2" placeholder="Book Title">
            <input type="text" wire:model="author" class="form-control mb-2" placeholder="Author">
            <input type="number" wire:model="quantity" class="form-control mb-2" placeholder="Quantity">
            @if($book_id)
                <button wire:click="update" class="btn btn-primary">Update Book</button>
            @else
                <button wire:click="create" class="btn btn-success">Add Book</button>
            @endif
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->quantity }}</td>
                        <td>
                            <button wire:click="edit({{ $book->id }})" class="btn btn-warning">Edit</button>
                            <button wire:click="delete({{ $book->id }})" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No books found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
