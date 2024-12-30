<?php

namespace App\Http\Controllers;

use App\Models\Book;

class GuestController
{
    function index() {
        try {
            $books = Book::where('status_del', false)->orderBy('book_title')->get();
            return view('guest.catalog', compact('books'));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'unexpectedError' => $th->getMessage()
            ]);
        }
    }
}
