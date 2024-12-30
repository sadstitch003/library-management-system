<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row p-4 g-4 align-items-start">
            <div class="col-12 p-3 card bg-1">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h6 class="mb-0">Book Catalog</h6>
                    </div>
                </div>
            </div>

            <div class="col-12 p-0 pt-3 card">
                <table class="table table-hover">
                    <thead>
                        <tr style="border-top: 1px solid rgba(0, 0, 0, 0.1);">
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">Book Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Category</th>
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>