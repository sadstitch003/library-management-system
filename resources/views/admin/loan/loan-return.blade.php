@extends('admin.layouts.admin-layout')

@section('content')
<div class="row p-4 g-4 align-items-start">
    <div class="col-12 p-3 card bg-1">
        <div class="row align-items-center">
            <div class="col-6">
                <h6 class="mb-0">Return Book</h6>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('loan') }}" class="btn btn-secondary btn-sm">Cancel</a>
            </div>
        </div>
    </div>

    <div class="col-12 p-0 pt-3 card">
        <form method="POST" action="{{ route('loan-return-process') }}">
            @csrf
            <div class="row g-3 p-4">
                <div class="col-12">
                    <label for="loan_id" class="form-label">Loan ID</label>
                    <input type="text" name="loan_id" class="form-control text-black-50" id="loan_id" value="{{ $loan->loan_id }}" readonly>
                </div>

                <div class="col-12">
                    <label for="book_title" class="form-label">Book Title</label>
                    <input type="text" name="book_title" class="form-control text-black-50" id="book_title" value="{{ $loan->getBook()->book_title }}" readonly>
                </div>

                <div class="col-12">
                    <label for="book_id" class="form-label">Book ID</label>
                    <input type="text" name="book_id" class="form-control text-black-50" id="book_id" value="{{ $loan->getBook()->book_id }}" readonly>
                </div>

                <div class="col-12">
                    <label for="book_publisher" class="form-label">Book Publisher</label>
                    <input type="text" name="book_publisher" class="form-control text-black-50" id="book_publisher" value="{{$loan->getBookCopy()->publishers->publisher_name}}" readonly>
                </div>

                <div class="col-12">
                    <label for="member_name" class="form-label">Member Name</label>
                    <input type="text" name="member_name" class="form-control text-black-50" id="member_name" value="{{ $loan->getMember()->member_name }}" readonly>
                </div>

                <div class="col-12">
                    <label for="loan_return_date" class="form-label">Loan Return Date</label>
                    <input type="date" name="loan_return_date" class="form-control text-black-50" id="loan_return_date" value="{{ $loan->return_date->format('Y-m-d') }}" readonly>
                    <small class="form-text text-danger">@error('loan_return_date') {{ $message }} @enderror</small>
                </div>

                <div class="col-12">
                    <label for="actual_return_date" class="form-label">Actual Return Date</label>
                    <input type="date" name="actual_return_date" class="form-control text-black-50" id="actual_return_date" value="{{ date('Y-m-d') }}" readonly>
                    <small class="form-text text-danger">@error('actual_return_date') {{ $message }} @enderror</small>
                </div>

                <div class="col-12">
                    <label for="book_condition" class="form-label">Book Condition</label>
                    <select name="book_condition" class="form-select" id="condition" required autofocus>
                        @foreach(\App\Helpers\Enums\BookCondition::cases() as $condition)
                            <option value="{{ $condition->value }}">{{ $condition->value }}</option>
                        @endforeach
                    </select>
                    <small class="form-text text-danger">@error('condition') {{ $message }} @enderror</small>
                </div>

                <div class="col-12 pb-2 pt-4">
                    <button type="submit" class="btn btn-primary col-12">Return Book</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
