<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newclass extends Model
{
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
