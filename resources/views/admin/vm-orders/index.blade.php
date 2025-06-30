
@extends('layouts.app')

@section('title', 'VM Orders Management')

@section('content')
    <div class="container py-4">
        <h2 class="mb-4">VM Orders Management</h2>

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
                        <th>User</th>
                        <th>Operating System</th>
                        <th>CPU</th>
                        <th>RAM</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->os }}</td>
                            <td>{{ $order->cpu }}</td>
                            <td>{{ $order->ram }} MB</td>
                            <td>
                                <span class="fw-semibold text-{{ $order->status === 'approved' ? 'success' : ($order->status === 'rejected' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td>
                                @if($order->status === 'pending')
                                    <form action="{{ route('vm-orders.approve', $order->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-success">Approve</button>
                                    </form>
                                    <form action="{{ route('vm-orders.reject', $order->id) }}" method="POST" class="d-inline ms-2">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                                    </form>
                                @else
                                    <span class="text-muted">No action</span>
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
@endsection