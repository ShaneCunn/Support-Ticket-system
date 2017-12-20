<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];


    // Category.php file

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
