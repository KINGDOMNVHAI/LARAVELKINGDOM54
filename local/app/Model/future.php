<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class future extends Model
{
    protected $table = 'future';

    protected $fillable = [
        'idFuture', 'nameFuture', 'imgFuture',
    ];

}
