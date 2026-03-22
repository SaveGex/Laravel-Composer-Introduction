@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <h1 class="mb-4">Create a New Post</h1>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            {{-- Title --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title') }}" placeholder="Enter post title" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Slug --}}
            <div class="mb-3">
                <label for="title" class="form-label">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                    value="{{ old('slug') }}" placeholder="Enter post slug" required>
                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Content --}}
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content" rows="6" class="form-control @error('content') is-invalid @enderror"
                    placeholder="Write your post content here..." required>{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Is Published --}}
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="1"
                    {{ old('is_published') ? 'checked' : '' }}>
                <label class="form-check-label" for="is_published">
                    Publish immediately
                </label>
            </div>

            <button type="submit" class="btn btn-success">
                Create Post
            </button>

            <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary ms-2">
                Back to Posts
            </a>

        </form>

    </div>
@endsection
