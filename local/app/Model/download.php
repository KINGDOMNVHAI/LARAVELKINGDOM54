<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class download extends Model
{
    protected $table = 'download';

    // Bỏ updated_at
    public $timestamps = false;

    protected $fillable = [
        'idDown', 'nameDown' , 'linkDown' , 'imgDown' , 'idCat' , 'idDetailPost'
    ];

}

