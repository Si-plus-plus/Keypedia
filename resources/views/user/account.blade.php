@extends('layouts.app')

@section('content')
    @include('components.error-card')

    @if (session('status') !== null )
        <div class="container mt-4 alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="container p-3">
        <div class="h1 text-center">
            Change Password
        </div>

        <div class="row justify-content-center">
            <form method="post" class="col-8" action="{{ route('changePassword') }}">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="txtOldPassword" class="col-form-label">
                        Old Password
                    </label>
                    <input type="password" class="form-control" id="txtOldPassword" name="oldPassword">
                </div>
                <div class="form-group row">
                    <label for="txtNewPassword" class="col-form-label">
                        New Password
                    </label>
                    <input type="password" class="form-control" id="txtNewPassword" name="password">
                </div>
                <div class="form-group row">
                    <label for="txtConfirmNewPassword" class="col-form-label">
                        Confirm Password
                    </label>
                    <input type="password" class="form-control" id="txtConfirmNewPassword" name="password_confirmation">
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary w-25 mx-auto">
                        Change Password
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endsection
