<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Approvals extends Model
{
   protected $table = 'approvals';
   protected $fillable = [
        'id_kategori_approval',
        'tipe_kategori_approval',
        'status',
        'action',
        'note',
        'created_at',
        'updated_at'
   ];

   public function syncFromTickets()
   {
      $tickets = Tickets::all();
      foreach($tickets as $ticket){
         $Exists = self::where('tipe_kategori_approval', Tickets::class)
                       ->where('id_kategori_approval', $ticket->no_ticket)
                       ->exists();
         if (!$Exists) {
            self::create([
                'id_kategori_approval'   => $ticket->no_ticket,
                'tipe_kategori_approval' => Tickets::class,
                'status'                 => $ticket->status ?? 'Pending',
                'action'                 => $ticket->action ?? null,
                'note'                   => null,
            ]);
        }
      }
   }

   public function approvable()
   {
    return $this->morphTo(null, 'tipe_kategori_approval', 'id_kategori_approval');
   }

   public static function updateTicket($request)
   {
      $ticket = Tickets::find($request->idTicket);
      if (!$ticket) return null;

      $ticket->update([
         'status' => $request->status,
         'action' => $request->action,
      ]);
   }
}
