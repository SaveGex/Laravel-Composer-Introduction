@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Profile Information</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-4 align-items-center">
                            <div class="col-auto">
                                <img src="{{ auth()->user()->icon_url }}" alt="Profile" 
                                     class="rounded-circle border" width="100" height="100" style="object-fit: cover;">
                            </div>
                            <div class="col">
                                <x-field 
                                    id="avatar" 
                                    type="file" 
                                    label:label="Change Avatar" 
                                    classes="form-control-sm"
                                />
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <x-field 
                                    id="name" 
                                    :value="$user->name" 
                                    label:label="Full Name" 
                                    required 
                                />
                            </div>
                            <div class="col-md-6 mb-3">
                                <x-field 
                                    id="email" 
                                    type="email" 
                                    :value="$user->email" 
                                    label:label="Email Address" 
                                    required 
                                />
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <x-field 
                                    id="password" 
                                    type="password" 
                                    label:label="New Password (leave blank to keep current)" 
                                />
                            </div>
                            <div class="col-md-6">
                                <x-field 
                                    id="password_confirmation" 
                                    type="password" 
                                    label:label="Confirm New Password" 
                                />
                            </div>
                        </div>

                        <div class="mt-4 d-flex justify-content-between align-items-center">
                            <span class="text-muted small text-uppercase">Member since {{ $user->created_at->format('M Y') }}</span>
                            <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection