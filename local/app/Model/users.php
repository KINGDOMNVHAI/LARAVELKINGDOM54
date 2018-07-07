<?php
namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class users extends Authenticatable
{
    //use Searchable;
    protected $table = 'users';

    // Bỏ updated_at
    public $timestamps = true;

    protected $fillable = [
        'lastname', 'firstname', 'username', 'password', 'email', 'type',
        'city', 'address', 'company', 'facebook', 'twitter',
        'aboutme', 'signature', 'avatar', 'banner',
    ];
}
