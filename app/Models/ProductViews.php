<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductViews extends Model
{
    use HasFactory;

    protected $table = "products_views";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product',
        'remote',
        'count',
    ];

    public function Product()
    {
        return $this->belongsTo(Product::class, 'product');
    }
}
