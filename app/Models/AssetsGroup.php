<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetsGroup extends Model
{
    protected $table = 'asset_group';
    protected $fillable = [
        'asset_group_name','description',
    ];
}
