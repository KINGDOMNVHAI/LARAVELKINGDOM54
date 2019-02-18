<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    protected $table = 'tags';

    // Bỏ updated_at
    public $timestamps = false;

    protected $fillable = [
        'idTag','nameTag',
    ];

}

