<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Category;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{
    //   'user_id', 'category_id', 'ticket_id', 'title', 'priority', 'message', 'tag', 'status'
    public function __construct()
    {
        $this->middleware('auth'); // check to see if your authenticated
    }

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
       // $tickets = Ticket::where('user_id', Auth::user()->id);
        $categories = Category::all();
        return view('datatable', compact('tickets', 'categories'));
    }

    public function getData()

    {

        return Datatables::of(Ticket::query())->make(true);

    }
}
