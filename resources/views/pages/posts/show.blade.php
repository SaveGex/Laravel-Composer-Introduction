@extends('layouts.pages.posts')

@section('content')
<div class="container mt-4">

    <div class="card shadow-sm">
        <div class="card-body">

            <h1 class="card-title">{{ $post->title }}</h1>

            <p class="text-muted mb-2">
                Author: {{ $post->author->name ?? ' ' }}
            </p>

            <p class="text-muted">
                Status:
                @if($post->is_published)
                    <span class="badge bg-success">Published</span>
                @else
                    <span class="badge bg-secondary">Draft</span>
                @endif
            </p>

            <hr>

            <div class="card-text">
                {!! nl2br(e($post->content)) !!}
            </div>

        </div>

        <div class="card-footer d-flex justify-content-between">
            <small class="text-muted">Slug: {{ $post->slug }}</small>

            <a href="{{ route('posts.index') }}" class="btn btn-outline-primary btn-sm">
                Come back
            </a>
        </div>
    </div>

</div>
@endsection