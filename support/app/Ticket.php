<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //

    protected $fillable = [
        'user_id', 'category_id', 'ticket_id', 'title', 'priority', 'message','tag', 'status'
    ];

}
