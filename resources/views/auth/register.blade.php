<div>
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
    @extends('layouts.app')

    @section('title', 'Register')

    @section('content')
        <div class="container">
            <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
                <div class="col-md-5">
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <h3 class="card-title text-center mb-4">Create Account</h3>

                            {{-- Важливо: enctype для завантаження файлів --}}
                            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <x-field
                                        id="name"
                                        classes="form-control"
                                        placeholder="Enter your name"
                                        :required="true"
                                        
                                        label:label="Name"
                                        label:class="form-label"/>
                                </div>

                                <div class="mb-3">
                                    <x-field
                                        id="email"
                                        classes="form-control"
                                        placeholder="Enter your email"
                                        :required="true"
                                        
                                        label:label="Email"
                                        label:class="form-label"/>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <x-field 
                                            id="password"
                                            classes="form-control"
                                            placeholder="Enter your password"
                                            :required="true"
                                            
                                            label:label="Password"
                                            label:class="form-label"/>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <x-field 
                                            id="password_confirmation"
                                            classes="form-control"
                                            placeholder="Confirm your password"
                                            :required="true"
                                            
                                            label:label="Confirm Password"
                                            label:class="form-label"/>
                                    </div>
                                </div>е

                                <div class="mb-4">
                                    <x-field
                                        id="avatar"
                                        classes="form-control"
                                        type="file"
                                        :required="false"
                                        
                                        label:label="Avatar"
                                        label:class="form-label"/>
                                </div>

                                <button type="submit" class="btn btn-success w-100">Create Account</button>
                            </form>

                            <div class="text-center mt-3">
                                <small>Already have an account? <a href="{{ route('login') }}">Login</a></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</div>
