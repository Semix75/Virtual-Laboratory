<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; // ← Tambahkan ini
use App\Models\VMOrder; // ← Dan ini
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalStudents = User::where('role', 'student')->count();
        $totalOrders = VMOrder::count();
        $pendingOrders = VMOrder::where('status', 'pending')->count();
        $approvedOrders = VMOrder::where('status', 'approved')->count();

        // dump($totalOrders);

        return view('admin.dashboard', compact(
            'totalStudents', 
            'totalOrders', 
            'pendingOrders', 
            'approvedOrders'
        ));
    }

}
