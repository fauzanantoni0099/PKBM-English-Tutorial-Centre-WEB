<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corporate extends Model
{
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
