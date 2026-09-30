@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-bold">Articles</h1>
        <p class="text-gray-600">Manage your articles efficiently.</p>
    </div>

    <a
        href="{{ route('articles.create') }}" 
        class="rounded bg-gray-900 hover:bg-gray-700 text-white text-xs px-4 py-2"
    >
        Create New Article
    </a>
</div>

<div class="overflow-hidden rounded border border-gray-200 bg-white">
    <table class="w-full text-sm">
        <thead class="border-b border-gray-200 bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-xs">Title</th>
                <th class="px-6 py-3 text-xs">Status</th>
                <th class="px-6 py-3 text-xs">Published At</th>
                <th class="px-6 py-3 text-xs text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($articles as $article)
            <tr>
                <td class="px-6 py-4">{{ $article->title }}</td>
                <td class="px-6 py-4">
                    <span class="rounded bg-gray-100 text-xs px-2 py-1">
                        {{ $article->status }}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $article->published_at?->format('Y-m-d H:i') ?? '---' }}
                </td>
                <td class="px-6 py-4">
                    <div class="flex justify-end gap-2">
                        <a 
                            href="{{ route('articles.edit', $article) }}" 
                            class="text-blue-500 hover:underline"
                        >
                            Edit
                        </a>

                        @if($article->status === 'draft')
                            <form action="{{ route('articles.publish', $article) }}" method="POST">
                                @csrf
                                <button type="submit" class="text-green-500 hover:underline ml-2 cursor-pointer">
                                    Publish
                                </button>
                            </form>
                        @endif

                        <form 
                            action="{{ route('articles.destroy', $article) }}" 
                            method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this article?');"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="text-red-500 hover:underline ml-2 cursor-pointer">
                                Delete
                            </button>
                        </form>
                    </div>                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection