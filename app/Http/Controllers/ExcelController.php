<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Exports\TransactionExport;

class ExcelController extends Controller
{
    public function export()
    {
        $export = new class implements FromCollection, WithHeadings {
            public function collection()
            {
                return Barang::all();
            }

            public function headings(): array
            {
                return ['Kode', 'Kategori', 'Nama', 'Merk'];
            }
        };
        return Excel::download($export, 'items-transsaction-report.xlsx');
    }
}
