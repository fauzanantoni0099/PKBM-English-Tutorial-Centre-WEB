<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
