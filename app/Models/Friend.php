<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'friendId');
    }

    public function targetUser()
    {
        return $this->belongsTo(User::class, 'targetUserId');
    }
}
