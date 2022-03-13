<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'firm_name',
        'tax_administration',
        'tax_no',
        'phone',
        'address',
        'billing_address',
    ];
}
