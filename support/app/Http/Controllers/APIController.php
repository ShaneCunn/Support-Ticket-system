<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Category;

class APIController extends Controller
{
    //   'user_id', 'category_id', 'ticket_id', 'title', 'priority', 'message', 'tag', 'status'
    public function getTickets()
    {

        $query = Ticket::select('category_id', 'ticket_id', 'title');
        return datatables($query)->make(true);
    }

    public function testindex(){

        $tickets = Ticket::all();

        return view('tickets.show', compact('tickets'));
    }

    public function table(){

        $tickets = Ticket::all();
        $categories = Category::all();
        return view('datatable', compact('tickets', 'categories'));
    }

    public function getData()

    {

        return Datatables::of(Ticket::query())->make(true);

    }
}
