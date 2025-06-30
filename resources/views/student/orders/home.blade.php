@extends('layouts.app')

@section('title', 'VM Order System Home')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="mb-4 text-muted">
                This system allows students to request virtual machine specifications and track their order status.
            </p>

            <div class="d-flex gap-3">
                <a href="{{ route('vm-orders.index') }}" class="btn btn-primary">
                    View My Orders
                </a>
                <a href="{{ route('vm-orders.create') }}" class="btn btn-success">
                    + Request New VM
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
