<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Helpers\DatabaseIdGenerator;

use App\Models\Loan;
use App\Models\Member;
use App\Models\Book;
use App\Models\BookCopy;
use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Admin;

use Carbon\Carbon;

use App\Helpers\Enums\BookCondition;
use App\Helpers\Enums\LoanStatus;

class AdminController
{
    //
    // Loan
    //

    function bookLoan(Request $request)
    {
        $filter = $request->query('filter', 'active');

        try {
            $loans = Loan::where('status_del', false)
                ->when($filter === 'active', function ($query) {
                    return $query->where('loan_status', 'Active');
                })
                ->when($filter === 'late', function ($query) {
                    return $query->whereNull('return_date_actual')
                        ->where('return_date', '<', now());
                })
                ->orderByDesc('created_at')
                ->get();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'unexpectedError' => $th->getMessage()
            ]);
        }

        Session::put('current_page', 'loan');
        return view('admin.loan.loan', compact('loans'));
    }

    function loanCreate()
    {
        try {
            $members = Member::where('status_del', false)->get();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'unexpectedError' => 'Failed to fetch members: ' . $th->getMessage()
            ]);
        }

        try {
            $bookCopies = BookCopy::where('is_available', true)->where('status_del', false)->get();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'unexpectedError' => 'Failed to fetch book copies: ' . $th->getMessage()
            ]);
        }

        return view('admin.loan.loan-create', compact('members', 'bookCopies'));
    }

    function loanCreateProcess(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'exists:members,member_id',
            'book_copy_id' => 'exists:book_copies,book_copy_id',
            'loan_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:loan_date',
        ]);

        if ($request->member_id == '' || $request->book_copy_id == '') {
            return back()->withErrors(['message' => 'Please select both a member and a book.'])->withInput();
        }

        try {
            $admin = Admin::where('admin_email', Auth::id())->first();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'unexpectedError' => 'Failed to fetch admin details: ' . $th->getMessage()
            ]);
        }

        try {
            Loan::create([
                'loan_id' => DatabaseIdGenerator::generateLoanId(),
                'member_id' => $validated['member_id'],
                'admin_id' => $admin->admin_id,
                'book_copy_id' => $validated['book_copy_id'],
                'loan_date' => $validated['loan_date'],
                'loan_status' => LoanStatus::ACTIVE->value,
                'return_date' => $validated['return_date'],
                'status_del' => false
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'unexpectedError' => 'Failed to create loan: ' . $th->getMessage()
            ]);
        }

        try {
            $bookCopy = BookCopy::find($validated['book_copy_id']);
            $bookCopy->is_available = false;
            $bookCopy->save();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'unexpectedError' => 'Failed to update book copy availability: ' . $th->getMessage()
            ]);
        }

        return redirect()->route('loan')->with('success', 'Loan created successfully.');
    }

    function loanReturn($loanId)
    {
        try {
            $loan = Loan::find($loanId);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'unexpectedError' => 'Failed to fetch loan details: ' . $th->getMessage()
            ]);
        }

        return view('admin.loan.loan-return', compact('loan'));
    }

    function loanReturnProcess(Request $request)
    {
        $validated = $request->validate([
            'loan_id' => 'required|exists:loans,loan_id',
            'actual_return_date' => 'required|date',
            'book_condition' => 'required|string',
        ]);

        try {
            $loan = Loan::where('loan_id', $validated['loan_id'])->where('status_del', false)->first();
            $loan->loan_status = now()->greaterThan(Carbon::parse($loan->return_date))
                ? LoanStatus::RETURNED_LATE->value
                : LoanStatus::RETURNED->value;
            $loan->return_date_actual = Carbon::parse($validated['actual_return_date'])->format('Y-m-d');
            $loan->return_book_condition = $validated['book_condition'];
            $loan->save();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'unexpectedError' => 'Failed to update loan details: ' . $th->getMessage()
            ]);
        }

        try {
            $bookCopy = BookCopy::where('book_copy_id', $loan->book_copy_id)->first();
            $bookCopy->is_available = true;
            $bookCopy->book_condition = $request->input('book_condition');
            $bookCopy->save();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'unexpectedError' => 'Failed to update book copy details: ' . $th->getMessage()
            ]);
        }

        return redirect()->route('loan')->with('success', 'Loan has been returned successfully.');
    }

    //
    // Book
    //

    function bookData(Request $request)
    {
        try {
            $tab = $request->get('tab', 'book');
            $books = Book::where('status_del', false)->orderBy('book_title')->get();
            $bookCopies = BookCopy::where('status_del', false)->get();

            Session::put('current_page', 'book');
            return view('admin.book.book', compact('books', 'bookCopies', 'tab'));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'unexpectedError' => $th->getMessage()
            ]);
        }
    }

    function bookCreate()
    {
        try {
            $books = Book::where('status_del', false)->orderBy('book_title')->get();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'unexpectedError' => $th->getMessage()
            ]);
        }

        try {
            $authors = Author::where('status_del', false)->orderBy('author_name')->get();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'unexpectedError' => $th->getMessage()
            ]);
        }

        try {
            $categories = Category::where('status_del', false)->orderBy('category_name')->get();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'unexpectedError' => $th->getMessage()
            ]);
        }

        try {
            $publishers = Publisher::where('status_del', false)->orderBy('publisher_name')->get();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'unexpectedError' => $th->getMessage()
            ]);
        }

        return view('admin.book.book-create', compact('books', 'authors', 'categories', 'publishers'));
    }

    function bookCreateProcess(Request $request)
    {
        $validated = $request->validate([
            'book_title' => 'required|string|max:255',
            'new_author' => 'nullable|string|max:255|unique:authors,author_name',
            'new_category' => 'nullable|string|max:255|unique:categories,category_name',
        ]);

    
        if (!empty($validated['new_author'])) {
            try {
                $author_id = DatabaseIdGenerator::generateAuthorId($validated['new_author']);
                Author::create([
                    'author_id' => $author_id,
                    'author_name' => $validated['new_author'],
                    'status_del' => false
                ]);
            } catch (\Throwable $th) {
                return redirect()->back()->withErrors([
                    'unexpectedError' => "Failed to handle author: " . $th->getMessage()
                ]);
            }
        } else {
            $author_id = $request->validate(['author_id' => 'required|exists:authors,author_id']);
        }
 

        if (!empty($validated['new_category'])) {
            try {
                $category_id = DatabaseIdGenerator::generateCategoryId($validated['new_category']);
                Category::create([
                    'category_id' => $category_id,
                    'category_name' => $validated['new_category'],
                    'status_del' => false
                ]);
            } catch (\Throwable $th) {
                return redirect()->back()->withErrors([
                    'unexpectedError' => "Failed to handle category: " . $th->getMessage()
                ]);
            }
        } else {
            $category_id = $request->validate(['category_id' => 'required|exists:categories,category_id']);
        }


        try {
            $book = Book::create([
                'book_id' => DatabaseIdGenerator::generateBookId($validated['book_title']),
                'book_title' => $validated['book_title'],
                'status_del' => false
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'unexpectedError' => "Failed to create book: " . $th->getMessage()
            ]);
        }

        try {
            $book->authors()->attach($author_id['author_id']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'unexpectedError' => "Failed to attach author: " . $th->getMessage()
            ]);
        }

        try {
            $book->categories()->attach($category_id['category_id']);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'unexpectedError' => "Failed to attach category: " . $th->getMessage()
            ]);
        }

        return redirect()->route('book')->with('success', 'Book created successfully!');
    }

    function bookCopyCreateProcess(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,book_id',
            'new_publisher' => 'nullable|string|max:255|unique:publishers,publisher_name',
            'year_published' => 'required|string|regex:/^\d{4}$/',
            'book_condition' => 'required|string',
            'quantity' => 'required|numeric|min:1',
        ]);

        try {
            if (!empty($validated['new_publisher'])) {
                $publisher_id = DatabaseIdGenerator::generatePublisherId($validated['new_publisher']);
                Publisher::create([
                    'publisher_id' => $publisher_id,
                    'publisher_name' => $validated['new_publisher'],
                    'status_del' => false
                ]);
            } else {
                $validatedPublisher = $request->validate(['publisher_id' => 'required|exists:publishers,publisher_id']);
                $publisher_id = $validatedPublisher['publisher_id'];
            }
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'unexpectedError' => "Failed to handle publisher: " . $th->getMessage()
            ]);
        }

        try {
            $quantity = $request->input('quantity');
            for ($i = 0; $i < $quantity; $i++) {
                BookCopy::create([
                    'book_copy_id' => DatabaseIdGenerator::generateBookCopyId($request->input('book_id'), $request->input('year_published')),
                    'book_id' => $request->input('book_id'),
                    'publisher_id' => $publisher_id,
                    'year_published' => $request->input('year_published'),
                    'book_condition' => $request->input('book_condition'),
                    'is_available' => true,
                    'status_del' => false,
                ]);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'unexpectedError' => "Failed to create book copies: " . $th->getMessage()
            ]);
        }

        return redirect()->route('book')->with('success', 'Book copies added successfully!');
    }



    //
    // Member
    //

    function memberData()
    {
        try {
            $member = Member::where('status_del', false)->orderBy('member_name')->get();
            Session::put('current_page', 'member');
            return view('admin.member.member', compact('member'));
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'unexpectedError' => $th->getMessage()
            ]);
        }
    }

    function memberCreate()
    {
        try {
            return view('admin.member.member-create');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'unexpectedError' => $th->getMessage()
            ]);
        }
    }

    function memberCreateProcess(Request $request)
    {
        $validated = $request->validate([
            'member_name' => 'required|string|max:255',
            'member_address' => 'required|string|max:500',
            'member_phone' => 'required|digits_between:10,15',
            'member_email' => 'required|email|unique:members,member_email',
        ]);

        try {
            $member = new Member();
            $member->member_id = DatabaseIdGenerator::generateMemberId($validated['member_name']);
            $member->member_name = $validated['member_name'];
            $member->member_address = $validated['member_address'];
            $member->member_phone = $validated['member_phone'];
            $member->member_email = $validated['member_email'];
            $member->status_del = false;
            $member->save();

            return redirect()->route('member')->with('success', 'Member added successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors([
                'unexpectedError' => $th->getMessage()
            ])->withInput();
        }
    }

}
