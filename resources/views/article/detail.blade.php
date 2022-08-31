@extends('layouts.app')
@section('title', $article->title)

@section('content')
    <h1>Article Detail</h1>
    <h4>Title</h4>
    <p>{{ $article->title }}</p>
    <h4>Body</h4>
    <p>{{ $article->body }}</p>
    <h4>Created At</h4>
    <p>{{ $article->created_at->format('d M Y') }}</p>
@endsection
