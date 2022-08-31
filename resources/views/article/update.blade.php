@extends('layouts.app')

@section('content')
    <h1>Update Article</h1>
    <div class="w-50">
        <form action="{{ route('article_update', $article->id) }}" method="post">
            @csrf
            @method("PUT")
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ $article->title }}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <textarea class="form-control" id="body" rows="3" name="body">{{ $article->body }}</textarea>
                @error('body')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-success">Edit</button>
        </form>
    </div>
@endsection
