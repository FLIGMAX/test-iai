<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produkt extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nazwa',
        'netto',
        'vat',
        'brutto',
        'waluta_id',
        'pkwiu',
        'jm',
        'rodzaj',
        'usluga',
        'symbol_gtu',
        'kod_produktu',
        'kod_kreskowy',
        'opis',
        'user_id'
    ];

    
    public function waluta() {
        return $this->belongsTo(Waluta::class);
    }
}
