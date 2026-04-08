<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tickets;
use App\Models\User;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        $Ticket = new Tickets();
        $Ticket->user_id = auth()->id();
        $Ticket->kategori_id = $request->query('category_id');
        $Ticket->sub_kategori = $request->query('sub_category');
        $Ticket->keterangan = $request->query('description');
        $Ticket->pictures = $request->query('picture');
        $Ticket->created_at = now();
        $Ticket->updated_at = now();
        $Ticket->save();

        return redirect()->route('dashboard');
    }

    public function update(Request $request, $id)
    {

    }
}
