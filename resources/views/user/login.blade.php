@extends('layouts.app')

@section('content')
    @include('components.error-card')

    <div class="container p-3">
        <div class="h1 text-center">
            Login
        </div>

        <div class="row justify-content-center">
            <form method="post" class="col-8" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="txtEmail" class="col-form-label">
                        Email Address
                    </label>
                    <input type="email" class="form-control" id="txtEmail" name="email" value="{{ Cookie::get('rememberedEmail') }}">
                </div>
                <div class="form-group row">
                    <label for="txtPassword" class="col-form-label">
                        Password
                    </label>
                    <input type="password" class="form-control" id="txtPassword" name="password">
                </div>
                <div class="form-group form-check row">
                    <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
                    <label for="rememberMe" class="form-check-label"> Remember Me </label>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary w-25 mx-auto">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endsection
