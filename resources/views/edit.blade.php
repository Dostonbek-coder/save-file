@extends('layouts.app')
@section('title','Edit Post')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Edit Post</h1>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form id="editForm" action="{{ route('posts.update', $post->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="editName" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="editName"
                            value="{{ old('name', $post->name) }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="editBody" class="form-label">Body</label>
                        <textarea class="form-control @error('body') is-invalid @enderror" id="editBody" name="body" rows="3">{{ old('body', $post->body) }}</textarea>
                        @error('body')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="editImage" class="form-label">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="editImage" name="image">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-warning">Update Post</button>
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection