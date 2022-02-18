<?php

namespace App\Models;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Complain extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'user_id'
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function customers()
    {
        return $this->hasMany(Customer::class, 'user_id');
    }
}
