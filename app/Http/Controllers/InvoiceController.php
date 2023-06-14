<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;

class InvoiceController extends Controller
{
    public function generateInvoice()
    {
        // // Mendapatkan data invoice dari database
        // $invoice = Invoice::findOrFail();

        // Menghasilkan PDF invoice menggunakan Dompdf
        $pdf = pdf::loadView('invoice');

        // Mengembalikan PDF sebagai response dengan nama file invoice.pdf
        return $pdf->download('invoice.pdf');

        return view('upload');
    }

    public function create()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        $invoice = new Invoice();
        $invoice->name = $request->input('name');
        $invoice->date = $request->input('date');
        $invoice->package = $request->input('package');
        // Set nilai tetap untuk atribut lainnya
        $invoice->total = 0; // Nilai tetap
        $invoice->description = 'Paket ' . $request->input('paket A', 'paket B', 'paket C', 'paket D', 'paket E'); // Nilai tetap

        $invoice->save();

        return view('upload', compact('invoice'));
    }
}

