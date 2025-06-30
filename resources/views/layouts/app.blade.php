<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Virtual Laboratory Order System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    @auth
                        <li class="nav-item">
                            @if(auth()->user()->role === 'admin')
                                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                                    Dashboard
                                </a>
                            @elseif(auth()->user()->role === 'student')
                                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                                    Dashboard
                                </a>
                            @endif
                        </li>

                        @if(auth()->user()->role === 'admin')
                            <li class="nav-item">
                                <a href="{{ route('admin.vm-orders.index') }}" class="nav-link {{ request()->routeIs('admin.vm-orders.*') ? 'active' : '' }}">
                                    Verify VM Orders
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.students.index') }}" class="nav-link {{ request()->routeIs('admin.students.*') ? 'active' : '' }}">
                                    Verify Students
                                </a>
                            </li>
                        @elseif(auth()->user()->role === 'student')
                            <li class="nav-item">
                                <a href="{{ route('vm-orders.index') }}" class="nav-link {{ request()->routeIs('vm-orders.*') ? 'active' : '' }}">
                                    Order VM
                                </a>
                            </li>
                        @endif
                    @endauth
                </ul>

                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-flex align-items-center">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link p-0 m-0" style="line-height: 2.5;">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container">
        <h1 class="mb-4">@yield('title')</h1>
        @yield('content')
    </main>

    <!-- Toast Container -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="toastNotification" class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Your request has been approved. Please check your mailbox: <span id="toastEmail"></span>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom Scripts -->
    @yield('scripts')
</body>
</html>