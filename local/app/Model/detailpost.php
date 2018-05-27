<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class detailpost extends Model
{
    //use Searchable;
    protected $table = 'detailpost';

    // Bỏ updated_at
    public $timestamps = true;

    protected $fillable = [
        'idDetailPost', 'nameDetailPost', 'urlDetailPost', 'presentDetailPost', 'contentDetailPost', 'dateDetailPost', 'imgDetailPost',
        'idCat', 'signature', 'author', 'viewDetailPost', 'enable', 'popularPost', 'updatePost',
    ];

}
