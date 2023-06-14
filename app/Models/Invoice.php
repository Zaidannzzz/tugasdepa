<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}

class InvoiceItem extends Model
{
    protected $table = 'invoice_items';

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
