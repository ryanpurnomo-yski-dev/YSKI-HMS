<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Tickets;
use App\Models\Approvals;

class DashboardController extends Controller
{
    public function index()
    {
        return redirect()->route('dashboard')
            ->with('Barang', Barang::all())
            ->with('Tickets', Tickets::all())
            ->with('Approval', Approvals::all());
    }
}