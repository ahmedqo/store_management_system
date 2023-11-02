<?php

namespace App\Models;

use App\Functions\Core;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'slug',
        'name_en',
        'name_fr',
        'name_it',
        'name_ar',
        'file',
        'description_en',
        'description_fr',
        'description_it',
        'description_ar',
    ];

    public function getNameAttribute()
    {
        return $this->{'name_' . Core::lang()};
    }

    public function getDescriptionAttribute()
    {
        return $this->{'description_' . Core::lang()};
    }
}
