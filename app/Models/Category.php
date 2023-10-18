<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category',
        'slug',
        'name',
        'file',
        'description',
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function Categories()
    {
        return $this->hasMany(Category::class, 'category');
    }
}
