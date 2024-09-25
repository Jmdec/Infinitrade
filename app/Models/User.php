<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\CartItem;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'verification_code',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Define the relationship with CartItem
    public function cartItems()
{
    return $this->hasMany(CartItem::class, 'user_id');
}

}
