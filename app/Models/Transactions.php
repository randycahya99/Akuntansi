<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $table = 'transactions';
    protected $fillable = [
        'trans_date','reference','description','debit_account','kredit_account','debit','kredit','posting'
    ];
}
