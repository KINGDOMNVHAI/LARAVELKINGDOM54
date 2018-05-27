<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class categorypost extends Model
{
    protected $table = 'category_post';

    // Bỏ updated_at
    public $timestamps = false;

    protected $fillable = [
        'id', 'idDetailPost', 'idCat'
    ];

    public function posts()
    {
        return $this->hasMany('App\Model\detailpost', 'idDetailPost', 'idCat');
    }
}
