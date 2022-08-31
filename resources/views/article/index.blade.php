@extends('layouts.app')

@section('content')
    <h1>Article</h1>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="d-flex gap-3">
        @foreach ($articles as $item)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <a href="{{ route('article_show', $item->id) }}">{{ $item->title }}</a>
                    <p>{{ $item->body }}</p>
                    <div class="d-flex">
                        <a href={{ route('article_edit', $item->id) }} class="btn btn-warning">Edit</a>
                        <form action="{{ route('article_delete', $item->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger ms-2">Delete</a>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
