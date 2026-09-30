@extends('layouts.app')

@section('title', 'Edit Article')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold">Edit Article</h1>
    <p class="text-gray-600">Update the details of the article below.</p>
</div>

<form action="{{ route('articles.update', $article) }}" class="space-y-4" method="POST">
    @method('PUT')
    @csrf

    @include('articles::form', ['article' => $article])

    <div class="flex justify-end space-x-2">
        <a 
            href="{{ route('articles.index') }}" 
            class="rounded border border-gray-300 bg-white text-gray-700 px-4 py-2 text-xs"
        >
            Back to Articles
        </a>

        <button type="submit" class="rounded bg-gray-900 hover:bg-gray-700 text-white text-xs px-4 py-2 cursor-pointer">
            Update Article
        </button>
    </div>
</form>
@endsection