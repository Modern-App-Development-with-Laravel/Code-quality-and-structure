@extends('layouts.app')

@section('title', 'Create Article')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold">Add New Article</h1>
    <p class="text-gray-600">Fill out the form below to add a new article.</p>
</div>

<form action="{{ route('articles.store') }}" class="space-y-4" method="POST">
    @csrf

    @include('articles::form', ['article' => null])

    <div class="flex justify-end space-x-2">
        <a 
            href="{{ route('articles.index') }}" 
            class="rounded border border-gray-300 bg-white text-gray-700 px-4 py-2 text-xs"
        >
            Back to Articles
        </a>

        <button type="submit" class="rounded bg-gray-900 hover:bg-gray-700 text-white text-xs px-4 py-2 cursor-pointer">
            Create Article
        </button>
    </div>
</form>
@endsection