<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faktura extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dane',
        'sprzedawca',
        'nabywca',
        'pozycje',
        'user_id'
    ];




    protected $casts = [
        'dane' => 'array',
        'sprzedawca' => 'array',
        'nabywca' => 'array',
        'pozycje' => 'array'
    ];

}
