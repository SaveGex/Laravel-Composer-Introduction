@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Profile Details</h5>
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm px-3">
                        <i class="bi bi-pencil me-1"></i> Edit Profile
                    </a>
                </div>
                <div class="card-body p-4">
                    
                    <div class="row mb-4 align-items-center">
                        <div class="col-auto">
                            <img src="{{ $user->avatar_url }}" alt="Profile" 
                                 class="rounded-circle border" width="120" height="120" style="object-fit: cover;">
                        </div>
                        <div class="col">
                            <h2 class="mb-1">{{ $user->name }}</h2>
                            <p class="text-muted mb-0">{{ $user->email }}</p>
                            <span class="badge bg-light text-dark border mt-2">
                                Member since {{ $user->created_at->format('d M Y') }}
                            </span>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="small text-muted text-uppercase fw-bold">Full Name</label>
                            <div class="p-2 border-bottom">{{ $user->name }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="small text-muted text-uppercase fw-bold">Email Address</label>
                            <div class="p-2 border-bottom">{{ $user->email }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="small text-muted text-uppercase fw-bold">Account Status</label>
                            <div class="p-2">
                                <span class="text-success">●</span> Active
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="small text-muted text-uppercase fw-bold">Last Updated</label>
                            <div class="p-2 border-bottom">{{ $user->updated_at->diffForHumans() }}</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection