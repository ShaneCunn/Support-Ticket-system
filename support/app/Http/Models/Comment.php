<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    //public $table = 'name_exact_of_the_table';


    protected $fillable = [
        'ticket_id', 'user_id', 'comment', 'image'
    ];



    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
