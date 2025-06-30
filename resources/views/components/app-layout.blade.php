<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- sesuaikan jika pakai vite --}}
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen">
        {{-- Optional navbar --}}
        @include('layouts.navigation')

        {{-- Header slot (jika kamu pakai slot bernama $header) --}}
        @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4">
                {{ $header }}
            </div>
        </header>
        @endisset

        {{-- ✅ INI YANG PENTING --}}
        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html>
