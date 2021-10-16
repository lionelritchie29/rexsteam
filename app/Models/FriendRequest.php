<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FriendRequest extends Model
{
    use HasFactory;

    public function sender() {
        return $this->belongsTo(User::class, 'sender_user_id');
    }

    public function target() {
        return $this->belongsTo(User::class, 'target_user_id');
    }
}
