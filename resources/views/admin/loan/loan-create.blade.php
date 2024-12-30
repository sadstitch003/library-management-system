@extends('admin.layouts.admin-layout')

@section('content')
<div class="row p-4 g-4 align-items-start">
    <div class="col-12 p-3 card bg-1">
        <div class="row align-items-center">
            <div class="col-6">
                <h6 class="mb-0">Add Loan</h6>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('loan') }}" class="btn btn-secondary btn-sm">Back to Loans</a>
            </div>
        </div>
    </div>

    <div class="col-12 p-0 pt-3 card">
        <form action="{{ route('loan-create-process') }}" method="POST">
            @csrf
            <div class="row g-3 p-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="member_id" class="form-label">Member Name</label>
                        <select id="member_id" name="member_id" class="form-select @error('member_id') is-invalid @enderror">
                            <option value="">Select Member</option>
                            @foreach($members as $member)
                                <option value="{{ $member->member_id }}">{{ $member->member_name }}</option>
                            @endforeach
                        </select>
                        @error('member_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="book_copy_id" class="form-label">Book</label>
                        <select id="book_copy_id" name="book_copy_id" class="form-select @error('book_copy_id') is-invalid @enderror">
                            <option value="">Select Book</option>
                            @foreach($bookCopies as $bookCopy)
                                <option value="{{ $bookCopy->book_copy_id }}">
                                    {{ $bookCopy->book->book_title }} (ID: {{ $bookCopy->book_copy_id }})
                                </option>
                            @endforeach
                        </select>
                        @error('book_copy_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="loan_date" class="form-label">Loan Date</label>
                        <input type="date" id="loan_date" name="loan_date" class="form-control @error('loan_date') is-invalid @enderror" value="{{ \Carbon\Carbon::today()->toDateString() }}" readonly>
                        @error('loan_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="return_date" class="form-label">Due Date</label>
                        <input type="date" id="return_date" name="return_date" class="form-control @error('return_date') is-invalid @enderror" value="{{ \Carbon\Carbon::today()->addDays(7)->toDateString() }}" readonly>
                        @error('return_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="col-12 pb-2 pt-4">
                    <button type="submit" class="btn btn-primary col-12">Save Loan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
