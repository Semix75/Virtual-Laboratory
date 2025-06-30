<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VMOrder;
use Illuminate\Http\Request;

class VMVerificationController extends Controller
{
    public function index()
    {
        $orders = VMOrder::with('user')->latest()->get();
        return view('admin.vm-orders.index', compact('orders'));
    }

    public function approve(VMOrder $order)
    {
        $order->update(['status' => 'approved']);
        return back()->with('success', 'VM order approved.');
    }

    public function reject(VMOrder $order)
    {
        $order->update(['status' => 'rejected']);
        return back()->with('success', 'VM order rejected.');
    }
}
