<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Invoice</title>

        <style>
        /* Gaya-gayaan CSS Anda bisa ditempatkan di sini */
        /* Misalnya: */
        body {
            font-family: Arial, sans-serif;
        }

        .invoice {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-body {
            margin-bottom: 40px;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-table th,
        .invoice-table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .invoice-table th {
            background-color: #f9f9f9;
            text-align: left;
        }

        .invoice-total {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="invoice-header">
            <h1>Invoice</h1>
            <p>Nomor Invoice: #{{ $invoice->invoice_number }}</p>
            <p>Tanggal: {{ $invoice->invoice_date }}</p>
        </div>
        <div class="invoice-body">
            <table class="invoice-table">
                <thead>
                    <tr>
                        <th>Deskripsi</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoice->items as $item)
                        <tr>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->unit_price }}</td>
                            <td>{{ $item->quantity * $item->unit_price }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="invoice-total">Total:</td>
                        <td>{{ $invoice->total }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="invoice-footer">
            <p>Terima kasih atas pembayaran Anda.</p>
        </div>
    </div>
</body>
</html>
