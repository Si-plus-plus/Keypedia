@extends('layouts.app')

@section('content')
    @include('components.error-card')

    <div class="container p-3">
        <div class="h1 text-center">
            Register
        </div>

        <div class="row justify-content-center">
            <form class="col-8" action="{{ route('register') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="txtUsername" class="col-form-label">
                        Username
                    </label>
                    <input type="text" class="form-control" id="txtUsername" name="username">
                </div>

                <div class="form-group row">
                    <label for="txtEmail" class="col-form-label">
                        Email Address
                    </label>
                    <input type="email" class="form-control" id="txtEmail" name="email">
                </div>

                <div class="form-group row">
                    <label for="txtPassword" class="col-form-label">
                        Password
                    </label>
                    <input type="password" class="form-control" id="txtPassword" name="password">
                </div>

                <div class="form-group row">
                    <label for="txtConfirmPassword" class="col-form-label">
                        Confirm Password
                    </label>
                    <input type="password" class="form-control" id="txtConfirmPassword" name="password_confirmation">
                </div>

                <div class="form-group row">
                    <legend class="col-form-label">
                        Gender
                    </legend>
                    <div class="col-xs-12 col-lg-8">
                        <div class="form-check form-check-inline my-2">
                            <input type="radio" class="form-check-input" name="gender" id="male" value="male">
                            <label for="male" class="form-check-label">
                                Male
                            </label>
                        </div>
                        <div class="form-check form-check-inline my-2">
                            <input type="radio" class="form-check-input" name="gender" id="female" value="female">
                            <label for="female" class="form-check-label">
                                Female
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="txtBirth" class="col-form-label">
                        Date of Birth
                    </label>
                    <input type="text" class="form-control" id="txtBirth" placeholder="mm/dd/yyyy" name="dob">
                </div>

                <div class="form-group row">
                    <label for="txtAddress" class="col-form-label">
                        Address
                    </label>
                    <textarea class="form-control" id="txtAddress" rows="3" name="address"></textarea>
                </div>

                <div class="row">
                    <button type="submit" class="btn btn-primary w-25 mx-auto">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
