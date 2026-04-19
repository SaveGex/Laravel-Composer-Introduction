@extends('layouts.pages.posts')

@section('content')
    <div class="container mt-4">

        <div class="d-flex justify-content-between">
            <h1 class="mb-4">Posts List</h1>
            <a href="{{ route('posts.create') }}" class="btn btn-success h-75 d-inline-block">Create Post</a>
        </div>

        @if ($posts->isEmpty())
            <div class="alert alert-info">
                Empty.
            </div>
        @else
            <div class="row g-4">
                @foreach ($posts as $post)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm">

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <h5 class="card-title">{{ $post->title }}</h5>

                                        <p class="text-muted mb-1">
                                            Author: {{ $post->author->name ?? 'Невідомо' }}
                                        </p>

                                        <p class="text-muted">
                                            @if ($post->is_published)
                                                <span class="badge bg-success">Published</span>
                                            @else
                                                <span class="badge bg-secondary">Draft</span>
                                            @endif
                                            <span class="badge text-bg-info">{{ $post->created_at->format('Y.m.d') }} AT {{ $post->created_at->format('H:i') }}</span>
                                        </p>

                                        <p class="card-text flex-grow-1">
                                            {{ Str::limit($post->content, 120) }}
                                        </p>

                                        <div class="col-12 d-flex justify-content-between align-items-center">
                                            <div>
                                                <a href="{{ route('posts.show', $post->id) }}"
                                                    class="btn btn-primary mt-auto">
                                                    details
                                                </a>
                                            </div>
                                            <div>
                                                <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this post?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
@endsection
