<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationItem extends Model
{
    use HasFactory;

    protected $table = "quotations_items";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'quotation',
        'product',
        'unit',
        'quantity',
        'price',
        'status',
    ];

    public function Product()
    {
        return $this->belongsTo(Product::class, 'product');
    }

    public function Quotation()
    {
        return $this->belongsTo(Quotation::class, 'quotation');
    }
}
