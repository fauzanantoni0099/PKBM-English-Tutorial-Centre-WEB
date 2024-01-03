<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];

    public function corporates()
    {
        return $this->hasMany(Corporate::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }
    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
