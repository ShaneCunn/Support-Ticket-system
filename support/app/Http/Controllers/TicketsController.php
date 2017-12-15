<?php

namespace App\Http\Controllers;

use App\User;
use App\Ticket;
use App\Category;
use App\Http\Requests;
use App\Mailers\AppMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class TicketsController extends Controller
{

    public function userTickets()
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->paginate(10);
        $categories = Category::all();

        return view('tickets.user_tickets', compact('tickets', 'categories'));
    }

    public function show($ticket_id)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

        $comments = $ticket->comments;

        $category = $ticket->category;

        return view('tickets.show', compact('ticket', 'category', 'comments'));
    }

    /**
     * Show the form for opening a new ticket.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('tickets.create', compact('categories'));
    }

    public function index()
    {
        $tickets = Ticket::paginate(10);
        $categories = Category::all();

        return view('tickets.index', compact('tickets', 'categories'));
    }

    public function close($ticket_id, AppMailer $mailer)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

        $ticket->status = 'Closed';

        $ticket->save();

        $ticketOwner = $ticket->user;

        $mailer->sendTicketStatusNotification($ticketOwner, $ticket);

        return redirect()->back()->with("status", "The ticket has been closed.");
    }


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, AppMailer $mailer)
    {
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'priority' => 'required',
            'message' => 'required'
        ]);

        $ticket = new Ticket([
            'title' => $request->input('title'),
            'user_id' => Auth::user()->id,
            'ticket_id' => strtoupper(str_random(10)),
            'category_id' => $request->input('category'),
            'priority' => $request->input('priority'),
            'tag' => $request->input('tag'),
            'message' => $request->input('message'),


            'status' => "Open",
        ]);
        // saves our image to database
        if ($request->hasFile('support_image')) {
            $image = $request->file('support_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/tickets/' . $filename);
            Image::make($image)->fit(800)->save($location);
            $ticket->image = $filename;

        }
        $ticket->save();

        $mailer->sendTicketInformation(Auth::user(), $ticket);

        return redirect()->back()->with("status", "<a href=\"tickets\\$ticket->ticket_id\" class=\"alert-link\"> A ticket with ID: # $ticket->ticket_id has been opened.</a>");
    }
}
