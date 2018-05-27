<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'category';

    // Bỏ updated_at
    public $timestamps = false;

    protected $fillable = [
        'idCat', 'nameCat'
    ];

    public function posts()
    {
        return $this->hasMany('App\Model\detailpost', 'idDetailPost', 'idCat');
    }
}
