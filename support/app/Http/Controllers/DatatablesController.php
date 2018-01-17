<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\User;
use App\Ticket;
use App\Category;
use DB;

class DatatablesController extends Controller
{
    //

    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('datatables.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {


        $tickets = DB::table('tickets')->join('categories', 'tickets.category_id', '=', 'categories.id')
            ->select(['tickets.id', 'categories.name', 'tickets.title', 'tickets.updated_at', 'tickets.status', 'tickets.ticket_id', 'tickets.priority']);
        return Datatables::of($tickets)
            ->editColumn('title', '{!! str_limit($title, 60) !!}')
            ->editColumn('name', '{!! str_limit($name, 60) !!}')
            ->addColumn('action', function ($tickets) {

                $return = '<a href="tickets/' . $tickets->ticket_id . '" class="btn btn-xs btn-primary">
<i class="glyphicon glyphicon-edit"></i> Read </a>';

                return $return;

            })->make(true);


    }
}
