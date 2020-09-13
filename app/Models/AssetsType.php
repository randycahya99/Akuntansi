<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetsType extends Model
{
    protected $table = 'asset_type';
    protected $fillable = [
        'asset_type_name','asset_group_name','qty','description'
    ];
}
