@extends('admin.layouts.admin-layout')

@section('content')
<div class="row p-4 g-4 align-items-start">
    <div class="col-12 p-3 card bg-1">
        <div class="row align-items-center">
            <div class="col-6">
                <h6 class="mb-0">Loans Data</h6>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('loan-create') }}" class="btn btn-primary btn-sm">Add Loan +</a>
            </div>
        </div>
    </div>

    <div class="col-12 p-0 pt-3 card">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link {{ request('filter') == 'active' || request('filter') == null ? 'active' : '' }}" 
                href="{{ route('loan', ['filter' => 'active']) }}">Active</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request('filter') == 'late' ? 'active' : '' }}" 
                href="{{ route('loan', ['filter' => 'late']) }}">Late</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request('filter') == 'all' ? 'active' : '' }}" 
                href="{{ route('loan', ['filter' => 'all']) }}">All</a>
            </li>
        </ul>

        <table class="table table-hover">
            <thead>
                <tr style="border-top: 1px solid rgba(0, 0, 0, 0.1);">
                    <th class="text-center">No</th>
                    <th>Member Name</th>
                    <th>Book ID</th>
                    <th>Book Name</th>
                    <th>Publisher</th>
                    <th>Loan Date</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($loans as $loan)
                    <tr class="{{ $loan->isLate() ? 'text-danger' : '' }}">
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $loan->getMember()->member_name }}</td>
                        <td>{{ $loan->getBookCopy()->book_copy_id }}</td>
                        <td>{{ $loan->getBook()->book_title }}</td>
                        <td>{{ $loan->getBookCopy()->publishers->publisher_name }}</td>
                        <td>{{ $loan->loan_date->format('Y-m-d') }}</td>
                        <td>{{ $loan->return_date->format('Y-m-d') }}</td>
                        <td class="{{ $loan->return_date_actual && $loan->return_date_actual->greaterThan($loan->return_date) || now()->greaterThan($loan->return_date) ? 'text-danger' : '' }}">
                            {{ $loan->loan_status }}
                        </td>
                        <td>
                            @if(is_null($loan->return_date_actual))
                                <a href="{{ route('loan-return', $loan->loan_id) }}" class="text-primary text-decoration-none">
                                    <i class="bi bi-folder-symlink"></i>
                                    Return
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
