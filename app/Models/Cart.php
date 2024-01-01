<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  database\migrations\CreateCartsTable;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','user_id', 'price_unit','quantity', 'TotalPrice'
    ];
}
