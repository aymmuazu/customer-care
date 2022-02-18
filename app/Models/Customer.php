<?php

namespace App\Models;

use App\Models\User;
use App\Models\Complain;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function complains()
    {
        return $this->belongsTo(Complain::class);
    }
}
