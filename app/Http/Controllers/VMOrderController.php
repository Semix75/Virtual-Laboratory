<?php

namespace App\Http\Controllers;

use App\Models\VMOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importation de la façade Auth

class VMOrderController extends Controller
{
    /**
     * Display a listing of the VM orders for the authenticated user.
     */
    public function index()
    {
        $orders = VMOrder::where('user_id', Auth::id())->get();
        return view('student.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new VM order.
     */
    public function create()
    {
        return view('student.orders.create');
    }

    /**
     * Store a newly created VM order in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'os' => 'required|string',
            'cpu' => 'required|integer|min:1',
            'ram' => 'required|integer|min:1',
        ]);

        VMOrder::create([
            'user_id' => Auth::id(),
            'os' => $request->os,
            'cpu' => $request->cpu,
            'ram' => $request->ram,
            'status' => 'pending',
        ]);

        session()->flash('success', 'VM request successfully submitted.');

        return redirect()->route('vm-orders.index');
    }
}