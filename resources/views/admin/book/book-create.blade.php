@extends('admin.layouts.admin-layout')

@section('content')
<div class="row p-4 g-4 align-items-start">
    <div class="col-12 p-3 card bg-1">
        <div class="row align-items-center">
            <div class="col-6">
                <h6 class="mb-0">Add Book</h6>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('book') }}" class="btn btn-secondary btn-sm">Back to Books</a>
            </div>
        </div>
    </div>

    <div class="col-12 p-0 pt-3 card">
        <form method="POST" action="{{ route('book-create-process') }}">
            @csrf
            <div class="row g-3 p-4">
                <div class="col-12">
                    <label for="book_title" class="form-label">Book Title</label>
                    <input type="text" name="book_title" class="form-control" id="book_title" placeholder="Enter Book Title" required>
                    <small class="form-text text-danger">@error('book_title') {{ $message }} @enderror</small>
                </div>

                <div class="col-12">
                    <label for="author_id" class="form-label">Author</label>
                    <div class="d-flex">
                        <select name="author_id" class="form-select" id="author_id">
                            <option value="">Select Author</option>
                            @foreach($authors as $author)
                                <option value="{{ $author->author_id }}">{{ $author->author_name }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="new_author" id="new-author-input" class="form-control d-none" placeholder="Enter New Author Name">
                    </div>
                    <small class="form-text text-danger">
                        @error('author_id') {{ $message }} @enderror
                        @error('new_author') {{ $message }} @enderror
                    </small>
                    <a href="javascript:void(0)" id="add-author" class="btn btn-link btn-sm">Add New Author</a>
                </div>

                <div class="col-12">
                    <label for="category_id" class="form-label">Category</label>
                    <div class="d-flex">
                        <select name="category_id" class="form-select" id="category_id">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="new_category" id="new-category-input" class="form-control d-none" placeholder="Enter New Category">
                    </div>
                    <small class="form-text text-danger">
                        @error('category_id') {{ $message }} @enderror
                        @error('new_category') {{ $message }} @enderror
                    </small>
                    <a href="javascript:void(0)" id="add-category" class="btn btn-link btn-sm">Add New Category</a>
                </div>

                <div class="col-12 pb-2 pt-4">
                    <button type="submit" class="btn btn-primary col-12">Save Book</button>
                </div>
            </div>
        </form>
    </div>

    <div class="col-12 p-3 card bg-1">
        <div class="row align-items-center">
            <div class="col-6">
                <h6 class="mb-0">Add Book Copy</h6>
            </div>
        </div>
    </div>

    <div class="col-12 p-0 pt-3 card">
        <form method="POST" action="{{ route('book-copy-create-process') }}">
            @csrf
            <div class="row g-3 p-4">
                <div class="col-12">
                    <label for="book_id" class="form-label">Book</label>
                    <select name="book_id" class="form-select" id="book_id" required>
                        <option value="">Select Book</option>
                        @foreach($books as $book)
                            <option value="{{ $book->book_id }}">{{ $book->book_title }}</option>
                        @endforeach
                    </select>
                    <small class="form-text text-danger">@error('book_id') {{ $message }} @enderror</small>
                </div>

                <div class="col-12">
                    <label for="publisher_id" class="form-label">Publisher</label>
                    <div id="publisher-select-container">
                        <select name="publisher_id" class="form-select" id="publisher_id">
                            <option value="">Select Publisher</option>
                            @foreach($publishers as $publisher)
                                <option value="{{ $publisher->publisher_id }}">{{ $publisher->publisher_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="publisher-text-container" class="d-none">
                        <input type="text" name="new_publisher" class="form-control" id="new_publisher" placeholder="Enter New Publisher">
                    </div>
                    <small class="form-text text-danger">
                        @error('publisher_id') {{ $message }} @enderror
                        @error('new_publisher') {{ $message }} @enderror
                    </small>
                    <a href="javascript:void(0)" id="add-publisher" class="btn btn-link btn-sm">Add New Publisher</a>
                </div>

                <div class="col-12">
                    <label for="year_published" class="form-label">Year Published</label>
                    <input type="text" name="year_published" class="form-control" id="year_published" placeholder="Enter Year Published" pattern="\d{4}" maxlength="4" required>
                    <small class="form-text text-danger">@error('year_published') {{ $message }} @enderror</small>
                </div>

                <div class="col-12">
                    <label for="book_condition" class="form-label">Condition</label>
                    <select name="book_condition" class="form-select" id="book_condition" required>
                        @foreach(\App\Helpers\Enums\BookCondition::cases() as $condition)
                            <option value="{{ $condition->value }}">{{ $condition->value }}</option>
                        @endforeach
                    </select>
                    <small class="form-text text-danger">@error('book_condition') {{ $message }} @enderror</small>
                </div>

                <div class="col-12">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Enter Quantity" min="1" required>
                    <small class="form-text text-danger">@error('quantity') {{ $message }} @enderror</small>
                </div>

                <div class="col-12 pb-2 pt-4">
                    <button type="submit" class="btn btn-primary col-12">Save Book Copy</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    
    const addAuthorBtn = document.getElementById('add-author');
    const authorSelect = document.getElementById('author_id');
    const newAuthorInput = document.getElementById('new-author-input');

    addAuthorBtn.addEventListener('click', function () {
        if (newAuthorInput.classList.contains('d-none')) {
            authorSelect.classList.add('d-none');
            newAuthorInput.classList.remove('d-none');
            newAuthorInput.focus();
        } else {
            newAuthorInput.classList.add('d-none');
            authorSelect.classList.remove('d-none');
            newAuthorInput.value = ''; 
        }
    });

    const addCategoryBtn = document.getElementById('add-category');
    const categorySelect = document.getElementById('category_id');
    const newCategoryInput = document.getElementById('new-category-input');

    addCategoryBtn.addEventListener('click', function () {
        if (newCategoryInput.classList.contains('d-none')) {
            categorySelect.classList.add('d-none');
            newCategoryInput.classList.remove('d-none');
            newCategoryInput.focus();
        } else {
            newCategoryInput.classList.add('d-none');
            categorySelect.classList.remove('d-none');
            newCategoryInput.value = ''; 
        }
    });

    const addPublisherBtn = document.getElementById('add-publisher');
    const publisherSelectContainer = document.getElementById('publisher-select-container');
    const publisherTextContainer = document.getElementById('publisher-text-container');

    addPublisherBtn.addEventListener('click', function () {
        if (publisherTextContainer.classList.contains('d-none')) {
            publisherSelectContainer.classList.add('d-none');
            publisherTextContainer.classList.remove('d-none');
        } else {
            publisherTextContainer.classList.add('d-none');
            publisherSelectContainer.classList.remove('d-none');
            document.getElementById('new_publisher').value = ''; 
        }
    });
});

</script>

@endsection