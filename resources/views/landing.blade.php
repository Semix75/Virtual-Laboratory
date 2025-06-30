<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - VM Order System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-800">

    <div class="min-h-screen flex flex-col justify-center items-center px-6 py-12">
        <div class="max-w-6xl w-full grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <!-- Illustration -->
            <div class="text-center">
                <img src="{{ asset('images/logo.png') }}" alt="VM Illustration" class="rounded-lg shadow-lg mx-auto w-full max-w-md">
                <p class="mt-4 text-sm text-gray-500">Jl. Jenderal Ahmad Yani, Bansir Laut, Kec. Pontianak Tenggara, Kota Pontianak, Kalimantan Barat 78124</p>
            </div>

            <!-- Content -->
            <div class="space-y-6">
                <h1 class="text-4xl font-bold text-gray-800">Welcome to the VM Order System</h1>
                <p class="text-lg text-gray-600">
                    This platform allows students of Polnep to request customized Virtual Machines (VMs) for learning and development.
                    Track your order status and manage your requests through a simple dashboard.
                </p>

                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <li>🖥️ Request VM with custom OS, CPU, and RAM specs</li>
                    <li>🛠️ View and monitor approval status by administrators</li>
                    <li>👨‍🎓 Only registered students are allowed to place VM requests</li>
                </ul>

                <div class="flex flex-wrap gap-4 mt-6">
                    <a href="{{ route('login') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded shadow">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                       class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded shadow">
                        Register
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
