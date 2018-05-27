<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class site extends Model
{
    protected $table = 'site';

    // Bỏ updated_at
    public $timestamps = false;

    protected $fillable = [
        'idSite','nameSite', 'urlSite', 'presentSite', 'imgSite', 'hiddenSite',
    ];

}

