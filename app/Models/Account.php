<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'account_master';
    protected $fillable = [
        'account_code','account_name','saldo_account','account_type_name','account_jenis_name'
    ];

    public function accountjenis()
    {
        return $this->belongsTo(AccountJenis::class, 'account_jenis_id');
    }

    public function accounttype()
    {
        return $this->belongsTo(AccountType::class, 'account_type_id');
    }
}
