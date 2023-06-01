<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade as PDF;

class InvoiceController extends Controller
{
    public function generateInvoice($id)
    {
        // Mendapatkan data invoice dari database
        $invoice = Invoice::findOrFail($id);

        // Menghasilkan PDF invoice menggunakan Dompdf
        $pdf = PDF::loadView('invoice', compact('invoice'));

        // Mengembalikan PDF sebagai response dengan nama file invoice.pdf
        return $pdf->download('invoice.pdf');
    }
}

