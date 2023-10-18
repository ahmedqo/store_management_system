<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Functions\Core;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category',
        'brand',
        'reference',
        'slug',
        'name',
        'unit',
        'price',
        'status',
        'details',
        'description',
    ];

    public function Brand()
    {
        return $this->belongsTo(Brand::class, 'brand');
    }

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function Files()
    {
        return $this->hasMany(ProductFile::class, 'product');
    }

    public function getTestAttribute()
    {
        return (Core::lang('ar') ? $this->price : $this->{'reference'}) . ' ' . Core::lang();
    }
}
