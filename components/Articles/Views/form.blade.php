<div>
    <div class="mb-4">
        <label for="title" class="block text-xs font-medium mb-2">
            Title
        </label>
        <input
            id="title"
            type="text"            
            name="title"
            value="{{ old('title', $article?->title) }}"
            class="block w-full border border-gray-300 bg-white rounded px-3 py-2 text-sm focus:outline-none"
        >
        @error('title')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="content" class="block text-xs font-medium mb-2">
            Content
        </label>
        <textarea
            id="content"
            name="content"
            rows="12"
            class="block w-full border border-gray-300 bg-white rounded px-3 py-2 text-sm focus:outline-none"
        >{{ old('content', $article?->content) }}</textarea>
        @error('content')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>