@extends('layouts.app')

@section('title', 'Student Verification')

@section('content')
    <div class="container px-0 py-3">


        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive shadow-sm">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                        <tr>
                            <td class="text-center">{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td class="text-center">
                                <span class="fw-semibold {{ $student->is_verified ? 'text-success' : 'text-warning' }}">
                                    {{ $student->is_verified ? 'Verified' : 'Pending' }}
                                </span>
                            </td>
                            <td class="text-center">
                                @if (empty($student->is_verified) || $student->is_verified == 2)
                                    <form method="POST" action="{{ route('admin.students.verify', $student->id) }}" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            Verify
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('admin.students.reject', $student->id) }}" class="d-inline ms-2">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Reject
                                        </button>
                                    </form>
                                @else
                                    <span class="text-success fw-semibold">Verified</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No students found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
