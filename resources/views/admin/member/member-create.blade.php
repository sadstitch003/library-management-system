@extends('admin.layouts.admin-layout')

@section('content')
<div class="row p-4 g-4 align-items-start">
    <div class="col-12 p-3 card bg-1">
        <div class="row align-items-center">
            <div class="col-6">
                <h6 class="mb-0">Add Member</h6>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('member') }}" class="btn btn-secondary btn-sm">Back to Members</a>
            </div>
        </div>
    </div>

    <div class="col-12 p-0 pt-3 card">
        <form method="POST" action="{{ route('member-create-process') }}">
            @csrf
            <div class="row g-3 p-4">
                <div class="col-12">
                    <label for="member_name" class="form-label">Name</label>
                    <input type="text" name="member_name" class="form-control" id="member_name" placeholder="Full Name"
                        required autofocus>
                    <small class="form-text text-danger">@error('member_name') {{ $message }} @enderror</small>
                </div>

                <div class="col-12">
                    <label for="member_address" class="form-label">Address</label>
                    <textarea name="member_address" class="form-control" id="member_address" placeholder="Enter Address"
                        required></textarea>
                    <small class="form-text text-danger">@error('member_address') {{ $message }} @enderror</small>
                </div>

                <div class="col-12">
                    <label for="member_phone" class="form-label">Phone</label>
                    <input type="text" name="member_phone" class="form-control" id="member_phone"
                        placeholder="Phone Number" required>
                    <small class="form-text text-danger">@error('member_phone') {{ $message }} @enderror</small>
                </div>

                <div class="col-12">
                    <label for="member_email" class="form-label">Email</label>
                    <input type="email" name="member_email" class="form-control" id="member_email"
                        placeholder="example@gmail.com" required>
                    <small class="form-text text-danger">@error('member_email') {{ $message }} @enderror</small>
                </div>

                <div class="col-12 pb-2 pt-4">
                    <button type="submit" class="btn btn-primary col-12">Save Member</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection