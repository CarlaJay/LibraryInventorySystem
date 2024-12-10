@extends('layouts.app')

@section('content')
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="form-group">
            <input type="text" wire:model="title" class="form-control" placeholder="Book Title">
            <input type="text" wire:model="author" class="form-control" placeholder="Author">
            <input type="number" wire:model="quantity" class="form-control" placeholder="Quantity">
            @if($book_id)
                <button wire:click="update" class="btn btn-primary">Update Book</button>
            @else
                <button wire:click="create" class="btn btn-success">Add Book</button>
            @endif
        </div>

        <hr>

        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->quantity }}</td>
                        <td>
                            <button wire:click="edit({{ $book->id }})" class="btn btn-warning">Edit</button>
                            <button wire:click="delete({{ $book->id }})" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
