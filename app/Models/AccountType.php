<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    protected $table = 'account_type';
    protected $fillable = [
        'type_code','account_jenis_name','account_type_name'
    ];

    public function accountjenis()
    {
        return $this->belongsTo(AccountJenis::class, 'account_jenis_id');
    }

    public function account()
    {
        return $this->hasMany(Account::class);
    }
}
