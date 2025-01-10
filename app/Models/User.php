<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function friends()
    {
        return $this->hasMany(Friend::class, 'friendId');
    }

    public function friendRequests()
    {
        return $this->hasMany(Friend::class, 'targetUserId');
    }

    public function avatars(){
        return $this->hasMany(Avatar::class, "userId");
    }

    public function hobby(){
        return $this->hasMany(Hobby::class, "userId");
    }

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
