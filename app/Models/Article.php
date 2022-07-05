<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{   
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_name',
        'part_number',
        'articel_group_Id',
        'prize',
    ];

}
