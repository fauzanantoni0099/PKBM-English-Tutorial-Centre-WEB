<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corporatecustomer extends Model
{
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function corporate()
    {
        return $this->belongsTo(Corporate::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
