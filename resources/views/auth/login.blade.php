<!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="card-title text-center mb-4">Welcome Back</h3>

                        <form action="{{ route('login') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <x-field
                                    id="email"
                                    classes="form-control"
                                    placeholder="Enter your email"
                                    :required="true"
                                    
                                    label:label="Email"
                                    label:class="form-label"/>
                            </div>

                            <div class="mb-3">
                                <x-field
                                    id="password"
                                    classes="form-control"
                                    placeholder="Enter your password"
                                    :required="true"
                                    
                                    label:label="Password"
                                    label:class="form-label"/>
                            </div>

                            <div class="mb-3 form-check">
                                <x-field
                                    id="remember"
                                    classes="form-check-input"
                                    type="checkbox"
                                    value="1"
                                    
                                    label:label="Remember Me"
                                    label:class="form-check-label"/>
                            </div>
                            @error('error')
                                <div class="alert alert-danger alert-dismissible fade show">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @enderror
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>

                        <div class="text-center mt-3">
                            <small>Don't have an account? <a href="{{ route('register') }}">Register</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
