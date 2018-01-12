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
        //return Datatables::of(User::query())->make(true);


        /*{ data: 'ticket_id', name: 'Id' },
        { data: 'title', name: 'title' },
        { data: 'created_at', name: 'created_at' },
        { data: 'updated_at', name: 'updated_at' }*/
        //   return Datatables::of(Ticket::query())->make(true);

        $tickets = DB::table('tickets')->join('categories', 'tickets.category_id', '=', 'categories.id')
            ->select(['tickets.id', 'categories.name', 'tickets.title', 'tickets.updated_at', 'tickets.status', 'tickets.ticket_id']);
        return Datatables::of($tickets)
            ->editColumn('title', '{!! str_limit($title, 60) !!}')
            ->editColumn('name', '{!! str_limit($name, 60) !!}')
            ->addColumn('action', function ($tickets) {

                $return = '<a href="tickets/' . $tickets->ticket_id . '" class="btn btn-xs btn-primary">
<i class="glyphicon glyphicon-edit"></i> Read </a><form  method="POST" action="/admin/close_ticket/' . $tickets->ticket_id . '">
                ' . csrf_field() . '
               <button type="submit" class="btn btn-danger" >Close</button ></form>';

                return $return;

            })
            ->make(true);
        /*$posts = DB::table('posts')->join('users', 'posts . user_id', ' = ', 'users . id')
            ->select(['posts . id', 'posts . title', 'users . name', 'users . email', 'posts . created_at', 'posts . updated_at']);

        return Datatables::of($posts)
            ->editColumn('title', '{
                    !!str_limit($title, 60) !!}')
            ->editColumn('name', function ($model) {
                return \HTML::mailto($model->email, $model->name);
            })
            ->make(true);*/
    }
}
