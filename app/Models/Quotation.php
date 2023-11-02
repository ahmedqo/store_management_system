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
        'request',
        'name',
        'email',
        'phone',
        'reference',
        'charge',
        'currency',
        'note_en',
        'note_fr',
        'note_it',
        'note_ar',
    ];

    public function getNoteAttribute()
    {
        return $this->{'note_' . Core::lang()};
    }

    public function Request()
    {
        return $this->belongsTo(Request::class, 'request');
    }

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
        }, 0);
    }

    public function Charge()
    {
        return $this->Total() * ($this->charge / 100);
    }
}
