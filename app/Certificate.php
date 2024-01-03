<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $guarded = [];

    public function Customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
