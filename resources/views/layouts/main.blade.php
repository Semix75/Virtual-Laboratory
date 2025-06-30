<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Aplikasi Laravel')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">

    <nav class="bg-white shadow p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Laravel + Tailwind</h1>
            <a href="#" class="text-blue-500 hover:underline">Logout</a>
        </div>
    </nav>

    <main class="container mx-auto mt-6">
        @yield('content')
    </main>

</body>
</html>
