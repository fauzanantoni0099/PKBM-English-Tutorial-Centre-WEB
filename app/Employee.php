<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }
    public function corporates()
    {
        return $this->hasMany(Employee::class);
    }
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
    public function expenses()
    {
        return $this->hasMany(Expenses::class);
    }
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
