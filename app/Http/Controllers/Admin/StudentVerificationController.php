<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class StudentVerificationController extends Controller
{
    public function index()
    {
        $students = User::where('role', 'student')->get();
        return view('admin.students.index', compact('students'));
    }

    public function verify(User $user)
    {
        $user->update(['is_verified' => 1]);

        return back()->with('success', 'Student has been verified.');
    }

    public function reject(User $user)
    {
        // Optional: bisa juga $user->delete(); jika mau menghapus
        $user->is_verified = 2; // tetap false
        $user->save();

        return redirect()->route('admin.students.index')->with('success', 'Student has been rejected.');
    }

    public function unverify(User $user)
    {
        $user->update(['is_verified' => 0]);
        return redirect()->back()->with('success', 'Student has been unverified.');
    }

}

