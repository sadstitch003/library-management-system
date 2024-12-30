@extends('admin.layouts.admin-layout')

@section('content')
<div class="row p-4 g-4 align-items-start">
    <div class="col-12 p-3 card bg-1">
        <div class="row align-items-center">
            <div class="col-6">
                <h6 class="mb-0">Member Data</h6>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('member-create') }}" class="btn btn-primary btn-sm">Add Member +</a>
            </div>
        </div>
    </div>

    <div class="col-12 p-0 pt-3 card">
        <table class="table table-hover">
            <thead>
                <tr style="border-top: 1px solid rgba(0, 0, 0, 0.1);">
                    <th scope="col" class="text-center">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($member as $m)
                <tr>
                    <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                    <td>{{ $m->member_name }}</td>
                    <td>{{ $m->member_address }}</td>
                    <td>{{ $m->member_phone }}</td>
                    <td>{{ $m->member_email }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
