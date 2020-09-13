<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $table = 'tax_groups';
    protected $fillable = [
        'tax_code','tax_name','rate',
    ];
}
