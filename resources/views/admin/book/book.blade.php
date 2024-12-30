@extends('admin.layouts.admin-layout')

@section('content')
<div class="row p-4 g-4 align-items-start">
    <div class="col-12 p-3 card bg-1">
        <div class="row align-items-center">
            <div class="col-6">
                <h6 class="mb-0">Book Data</h6>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('book-create') }}" class="btn btn-primary btn-sm">Add Book +</a>
            </div>
        </div>
    </div>

    <!-- Tab Navigation -->
    <div class="col-12 p-0 pt-3 card">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link {{ request('tab') == 'book' || request('tab') == null ? 'active' : '' }}" 
                href="{{ route('book', ['tab' => 'book']) }}">Book Data</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request('tab') == 'book_copy' ? 'active' : '' }}" 
                href="{{ route('book', ['tab' => 'book_copy']) }}">Book Copy</a>
            </li>
        </ul>

        <!-- Book Data Section -->
        @if(request('tab') == 'book' || request('tab') == null)
        <table class="table table-hover">
            <thead>
                <tr style="border-top: 1px solid rgba(0, 0, 0, 0.1);">
                    <th scope="col" class="text-center">No</th>
                    <th scope="col">Book Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Category</th>
                    <th scope="col">Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                    <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                    <td>{{ $book->book_title }}</td>
                    <td>
                        @foreach($book->getAuthor() as $author)
                            {{ $author->author_name }}@if(!$loop->last), @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($book->getCategory() as $category)
                            {{ $category->category_name }}@if(!$loop->last), @endif
                        @endforeach
                    </td>
                    <td>
                        @if($book->getAvailableBookCopy() > 0)
                            <span>{{ $book->getAvailableBookCopy() }}</span>
                        @else
                            <span class="text-danger">Not Available</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif

        <!-- Book Copy Section -->
        @if(request('tab') == 'book_copy')
        <table class="table table-hover">
            <thead>
                <tr style="border-top: 1px solid rgba(0, 0, 0, 0.1);">
                    <th scope="col" class="text-center">No</th>
                    <th scope="col">Book Copy ID</th>
                    <th scope="col">Book Title</th>
                    <th scope="col">Condition</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Availability</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookCopies as $copy)
                <tr>
                    <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                    <td>{{ $copy->book_copy_id }}</td>
                    <td>{{ $copy->book->book_title }}</td>
                    <td>{{ $copy->book_condition }}</td>
                    <td>{{ $copy->publishers->publisher_name }}</td>
                    <td>
                        @if($copy->is_available)
                            <span class="text-success">Available</span>
                        @else
                            <span class="text-danger">Not Available</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection
