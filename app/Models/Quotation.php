<?php

namespace App\Models;

use App\Functions\Core;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'reference',
        'charge',
        'currency',
        'note'
    ];

    public function Items()
    {
        return $this->hasMany(QuotationItem::class, 'quotation');
    }

    public function Total()
    {
        return $this->Items->reduce(function ($carry, $item) {
            if ($item->status == Core::states()[0])
                return $carry + ($item->price * $item->quantity);
            return $carry;
        }, 0) + $this->charge;
    }
}
