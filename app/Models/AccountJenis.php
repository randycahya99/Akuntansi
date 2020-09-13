<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountJenis extends Model
{
    protected $table = 'account_jenis';
    protected $fillable = [
        'jenis_code','account_jenis_name'
    ];

    public function accounttype()
    {
        return $this->hasMany(AccountType::class);
    }

    public function account()
    {
        return $this->hasMany(Account::class);
    }
}
