<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasSearch;
use App\Functions\Core;

class Product extends Model
{
    use HasFactory, HasSearch;

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
        'name_en',
        'name_fr',
        'name_it',
        'name_ar',
        'unit',
        'price',
        'status',
        'details_en',
        'details_fr',
        'details_it',
        'details_ar',
        'description_en',
        'description_fr',
        'description_it',
        'description_ar',
    ];

    protected $searchable = [
        'name_en',
        'name_fr',
        'name_it',
        'name_ar',

        'details_en',
        'details_fr',
        'details_it',
        'details_ar',

        'description_en',
        'description_fr',
        'description_it',
        'description_ar',

        'brand.name_en',
        'brand.name_fr',
        'brand.name_it',
        'brand.name_ar',

        'category.name_en',
        'category.name_fr',
        'category.name_it',
        'category.name_ar',
    ];

    public function getNameAttribute()
    {
        return $this->{'name_' . Core::lang()};
    }

    public function getDetailsAttribute()
    {
        return $this->{'details_' . Core::lang()};
    }

    public function getDescriptionAttribute()
    {
        return $this->{'description_' . Core::lang()};
    }

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
