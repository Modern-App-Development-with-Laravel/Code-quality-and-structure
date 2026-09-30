<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Articles')</title>

    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">
    <nav class="border-b border-gray-200 bg-white">
        <div class="mx-auto py-4 px-6 max-w-5xl">
            <a 
                href="{{ route('articles.index') }}" 
                class="text-gray-700 hover:text-gray-900 font-semibold"
            >
                Articles
            </a>
        </div>
    </nav>

    <div class="mx-auto py-8 px-6 max-w-5xl">
        @if(session('success'))
            <div class="rounded border border-green-200 bg-green-50 text-green-800 p-4 mb-6">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>