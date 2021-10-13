<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'card_name',
        'card_number',
        'card_mm',
        'card_yy',
        'cvv',
        'zip_code',
        'country',
        'purchased_at'
    ];
}
