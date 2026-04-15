<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tickets;
use App\Models\User;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $Ticket = new Tickets();
        $Ticket->no_ticket = $this->generateTicketNo($request->query('category_id')); 
        $Ticket->user_id = auth()->id();
        $Ticket->kategori_id = $request->query('category_id');
        $Ticket->sub_kategori = $request->query('sub_category');
        $Ticket->keterangan = $request->query('description');
        if($request->query('temp_picture')){
            $tempPath = $request->query('temp_picture');
            $newPath = str_replace('temp/', 'tickets/', $tempPath);
            if (\Storage::disk('public')->exists($tempPath)) {
                \Storage::disk('public')->move($tempPath, $newPath);
                $Ticket->pictures = $newPath;
            }
        }
        $Ticket->created_at = now();
        $Ticket->save();

        return redirect()->route('dashboard');
    }

    public function update(Request $request, $id)
    {

    }

    public function generateTicketNo($categoryId)
    {
        $lastTicket = Tickets::where('kategori_id', $categoryId)
                         ->orderBy('id', 'desc') 
                         ->first();

        if(!$lastTicket){
            $nextNumber = 1;
        }else{
            $lastNumber = (int) substr($lastTicket->no_ticket, 2);
            $nextNumber = $lastNumber + 1;
        }
        return sprintf('T%d%04d', $categoryId, $nextNumber);
    }
}
