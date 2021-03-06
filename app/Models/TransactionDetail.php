<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'game_id',
    ];

    public $timestamps = false;

    public function game() {
        return $this->belongsTo(Game::class);
    }
}
