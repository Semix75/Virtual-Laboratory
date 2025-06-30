@extends('layouts.app')

@section('title', 'Student Dashboard')

@section('content')
<div class="container py-4">
    <h1 class="h3 mb-4">Welcome, {{ auth()->user()->name }}</h1>

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <strong>Standard Operating Procedure (SOP) - VM Order</strong>
        </div>
        <div class="card-body">
            <p><strong>📌 Purpose:</strong> This guide explains how students can request a Virtual Machine (VM) using the system.</p>

            <ol class="list-group list-group-numbered mb-3">
                <li class="list-group-item">
                    <strong>Login to the System</strong><br>
                    Enter your email and password. After a successful login, you will be redirected to your Dashboard.
                </li>
                <li class="list-group-item">
                    <strong>Access the VM Order Menu</strong><br>
                    Click on the <code>Order VM</code> menu in the top navigation bar to see your VM orders.
                </li>
                <li class="list-group-item">
                    <strong>Create a New Order</strong><br>
                    Click the <span class="badge bg-success">+ Request New VM</span> button and fill in the request form:
                    <ul>
                        <li>Operating System</li>
                        <li>CPU (number of cores)</li>
                        <li>RAM (in MB)</li>
                    </ul>
                    Then click the <button class="btn btn-primary btn-sm">Submit Request</button> button.
                </li>
                <li class="list-group-item">
                    <strong>View Order Status</strong><br>
                    On the VM Order page, check the current status:
                    <ul>
                        <li><span class="badge bg-warning text-dark">Pending</span>: Waiting for admin approval</li>
                        <li><span class="badge bg-success">Approved</span>: Order has been approved</li>
                        <li><span class="badge bg-danger">Rejected</span>: Order has been rejected</li>
                    </ul>
                </li>
            </ol>

            <p class="mb-0"><strong>Note:</strong> Only orders with <span class="badge bg-success">Approved</span> status will be processed for deployment.</p>
        </div>
    </div>
</div>
@endsection
