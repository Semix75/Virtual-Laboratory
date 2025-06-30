
@extends('layouts.app')

@section('title', 'Request New VM')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="mb-4">Request New VM</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('vm-orders.store') }}" method="POST">
                @csrf

                <!-- Operating System -->
                <div class="mb-3">
                    <label for="os" class="form-label">Operating System</label>
                    <select name="os" id="os" class="form-select" required>
                        <option value="Ubuntu 24.05">Ubuntu 24.05</option>
                    </select>
                </div>

                <!-- CPU (cores) -->
                <div class="mb-3">
                    <label for="cpu" class="form-label">CPU (cores)</label>
                    <select name="cpu" id="cpu" class="form-select" required>
                        <option value="4">4</option>
                        <option value="8">8</option>
                        <option value="16">16</option>
                    </select>
                </div>

                <!-- RAM (MB) -->
                <div class="mb-3">
                    <label for="ram" class="form-label">RAM (MB)</label>
                    <select name="ram" id="ram" class="form-select" required>
                        <option value="4">4</option>
                        <option value="8">8</option>
                        <option value="16">16</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit Request</button>
            </form>
        </div>
    </div>
</div>
@endsection