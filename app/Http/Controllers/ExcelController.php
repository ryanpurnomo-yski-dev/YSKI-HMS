<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MaatWebsite\Excel\Facades\Excel;
use App\Exports\TransactionExport;

class ExcelController extends Controller
{
    public function export()
    {
        // Jika butuh ID, kamu bisa menangkapnya via request: export(Request $request)
        return Excel::download(new TransactionExport, "transaksi_barang.xlsx");
    }
}
