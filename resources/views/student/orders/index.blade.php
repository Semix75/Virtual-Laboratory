    
@extends('layouts.app')

@section('title', 'My VM Orders')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">My VM Orders</h2>

        <!-- Button to Order New VM -->
        <div class="mb-4">
            <a href="{{ route('vm-orders.create') }}" class="btn btn-primary">
                Order New VM
            </a>
        </div>

        <!-- Success Notification -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive shadow-sm">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Operating System</th>
                        <th>CPU</th>
                        <th>RAM</th>
                        <th>Status</th>
                        <th>Requested At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->os }}</td>
                            <td>{{ $order->cpu }}</td>
                            <td>{{ $order->ram }} MB</td>
                            <td>
                                <span class="fw-semibold text-{{ $order->status === 'approved' ? 'success' : ($order->status === 'rejected' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                @if($order->status === 'pending' || $order->status === 'rejected')
                                    <span class="text-muted">No action</span>
                                @elseif($order->status === 'approved')
                                    <button type="button" class="btn btn-sm btn-primary" onclick="showToast('{{ $order->user->email }}')">Mail</button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No VM orders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Toast Notification -->
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
@endsection

@section('scripts')
    <script>
        function showToast(email) {
            // Mettre à jour l'email dans la notification
            document.getElementById('toastEmail').textContent = email;

            // Afficher le toast
            const toastElement = document.getElementById('toastNotification');
            const toast = new bootstrap.Toast(toastElement);
            toast.show();
        }
    </script>
@endsection