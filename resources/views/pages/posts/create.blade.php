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
                    label="Title"
                    classes="form-control"
                    placeholder="Enter post title"
                    :required="true"/>
            </div>

            {{-- Slug --}}
            <div class="mb-3">
                <x-field
                    id="slug"
                    label="Slug"
                    classes="form-control"
                    placeholder="Enter post slug"
                    :required="true"/>
            </div>

            {{-- Content --}}
            <div class="mb-3">
                <x-field
                    id="content"
                    label="Content"
                    classes="form-control"
                    placeholder="Write your post content here..."
                    :required="true"/>
            </div>

            {{-- Is Published --}}
            <div class="form-check mb-3">
                <x-field
                    id="is_published"
                    label_attributes="form-check-label"
                    label="Publish immediately"
                    classes="form-check-input"
                    type="checkbox"
                    value="1"
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
