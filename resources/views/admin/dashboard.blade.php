@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="container">

        <div class="row">
            <!-- Total Students -->
            <div class="col-md-4 mb-4">
                <div class="card bg-primary text-white shadow">
                    <div class="card-body text-center">
                        <i class="bi bi-people-fill fs-1 mb-3"></i>
                        <h5 class="card-title">Total Students</h5>
                        <p class="card-text fs-2">{{ $totalStudents }}</p>
                    </div>
                </div>
            </div>

            <!-- Total VM Orders -->
            <div class="col-md-4 mb-4">
                <div class="card bg-success text-white shadow">
                    <div class="card-body text-center">
                        <i class="bi bi-hdd-stack-fill fs-1 mb-3"></i>
                        <h5 class="card-title">Total VM Orders</h5>
                        <p class="card-text fs-2">{{ $totalOrders }}</p>
                    </div>
                </div>
            </div>

            <!-- Pending Orders -->
            <div class="col-md-4 mb-4">
                <div class="card bg-warning border-warning">
                    <div class="card-body text-center">
                        <i class="bi bi-hourglass-split fs-1 mb-3"></i>
                        <h5 class="card-title">Pending Orders</h5>
                        <p class="card-text fs-2">{{ $pendingOrders }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <h4>Standard Operating Procedures (SOP)</h4>
            <ol>
                <li>Review new student accounts and verify them before granting access.</li>
                <li>Check the list of VM orders under <strong>"Verify VM Orders"</strong>.</li>
                <li>Approve or reject VM orders based on student request validity.</li>
                <li>Ensure that the system usage is monitored regularly.</li>
            </ol>
        </div>
    </div>

@endsection
