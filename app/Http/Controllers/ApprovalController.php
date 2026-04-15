<?php

namespace App\Http\Controllers;

use App\Models\Approvals;
use App\Models\Tickets;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function store(Request $request)
    {
        if($request->has('idTicket')){
            $noTicket = Tickets::where('id', $request->input('idTicket'))->value('no_ticket');
            $initialNoTicket = substr($noTicket, 0, 1);
            $Approvals = new Approvals();
            $Approvals->id_kategori_approval = $noTicket;
            switch($initialNoTicket){
                case 'T' : $Approvals->tipe_kategori_approval = 'Ticket'; break;
                case 'B' : $Approvals->tipe_kategori_approval = 'Barang'; break;
                default: break;
            }
            $Approvals->status = $request->input('status');
            $Approvals->action = $request->input('action');
            Approvals::updateTicket($request);
            $Approvals->note = $request->input('note');
            $Approvals->created_at = now();
            $Approvals->save();
            return redirect()->route('tickets');
        }else if($request->has('idReqItem')){
            $noReqItem = Tickets::where('id', $request->input('idReqItem'))->value('no_ticket');
            $initialNoReqItem = substr($noReqItem, 0, 1);
            $Approvals = new Approvals();
            $Approvals->id_kategori_approval = $noReqItem;
            switch($initialNoReqItem){
                case 'T' : $Approvals->tipe_kategori_approval = 'Ticket'; break;
                case 'B' : $Approvals->tipe_kategori_approval = 'Barang'; break;
                default: break;
            }
            $Approvals->status = $request->input('status');
            $Approvals->action = $request->input('action');
            Approvals::updateTicket($request);
            $Approvals->note = $request->input('note');
            $Approvals->created_at = now();
            $Approvals->save();
            return redirect()->route('tickets');
        }
    }

    public function update(Request $request)
    {

    }
}
