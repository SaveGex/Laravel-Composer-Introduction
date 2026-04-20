@extends('layouts.pages.posts')

@section('content')
    <div class="container mt-4">

        <h1 class="mb-4">Create a New Post</h1>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            {{-- Title --}}
            <div class="mb-3">
                <x-field
                    id="title"
                    classes="form-control"
                    placeholder="Enter post title"
                    :required="true"
                    
                    label:label="Title"
                    label:class="form-label"/>
            </div>

            {{-- Slug --}}
            <div class="mb-3">
                <x-field
                    id="slug"
                    classes="form-control"
                    placeholder="Enter post slug"
                    :required="true"
                    
                    label:label="Slug"
                    label:class="form-label"/>
            </div>

            {{-- Content --}}
            <div class="mb-3">
                <x-field
                    id="content"
                    classes="form-control"
                    placeholder="Write your post content here..."
                    :required="true"
                    
                    label:label="Post Content"
                    label:class="form-label"
                    />
            </div>

            {{-- Is Published --}}
            <div class="form-check mb-3">
                <x-field
                    id="is_published"
                    classes="form-check-input"
                    type="checkbox"
                    value="1"
                    
                    label:label="Publish immediately"
                    label:class="form-check-label"
                    />
            </div>

            <x-field
                type="submit"
                classes="btn btn-success"
                value="Create Post"
            />

            <x-field
                type="reset"
                classes="btn btn-outline-secondary ms-2"
                value="Reset"
            />

        </form>

    </div>
@endsection
