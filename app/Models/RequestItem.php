<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestItem extends Model
{
    use HasFactory;

    protected $table = "requests_items";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'request',
        'product',
        'quantity',
    ];

    public function Product()
    {
        return $this->belongsTo(Product::class, 'product');
    }

    public function Request()
    {
        return $this->belongsTo(Request::class, 'request');
    }
}
