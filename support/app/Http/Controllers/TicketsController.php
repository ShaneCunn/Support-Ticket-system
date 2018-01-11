<?php

namespace App\Http\Controllers;


use App\Ticket;
use App\Category;
use App\Http\Requests;
use App\Mailers\AppMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Purifier;



class TicketsController extends Controller
{

    public function userTickets()
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->paginate(10);
        // retrieve a authorised user  id and paginate results
        $categories = Category::all(); // return all results from DB, for that field


        return view('tickets.user_tickets', compact('tickets', 'categories'));
        // open the view user tickets and sent a an array to it
    }

    public function show($ticket_id)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
        // get ticket id and find the first id in the DB or throws a error

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

        $ticket->save(); // save the data to the DB

        $ticketOwner = $ticket->user;

        $mailer->sendTicketStatusNotification($ticketOwner, $ticket); // sent email to customer about the ticket

        return redirect()->back()->with("status", "The ticket has been closed.");
    }


    public function __construct()
    {
        $this->middleware('auth'); // check to see if your authenticated
    }

    public function store(Request $request, AppMailer $mailer)
    {

        // rules to check weather a field is required and rules for uploads
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'priority' => 'required',
            'message' => 'required',
            'support_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $ticket = new Ticket([ // creates a newt ticket object

            // take in data from the request variable and assign it to key pairs in the associative array
            'title' =>  strip_tags($request->input('title')),
            'user_id' => Auth::user()->id,
            'ticket_id' => strtoupper(str_random(10)),
            'category_id' => strip_tags($request->input('category')),
            'priority' => Purifier::clean ($request->input('priority')),
            'tag' => $request->input('tag'),
            'message' => Purifier::clean($request->input('message')),

            'status' => "Open",
        ]);

        //  if the  request has a file , it then saves  image location to database ie public/image/support
        if ($request->hasFile('support_image')) {
            $image = $request->file('support_image');
            $imagename = $image->hashName('support_image');
            //  $filename = time() . '.' . $image->getClientOriginalExtension();
            $filename = time() . '.' . $image->getClientOriginalExtension();

            $location = public_path('images/tickets/' . $filename); // set the file save location
            Image::make($image)->fit(800)->save($location); // resize image to 800 and save file
            $ticket->image = $filename; // pass the location to the  image field in database query

        }
        $ticket->save(); // save the query push it to the database as a query

        $mailer->sendTicketInformation(Auth::user(), $ticket); // sned mail to user
        //  redirect page with status and url link of ticket/comment
        return redirect()->back()->with("status", "<a href=\"tickets\\$ticket->ticket_id\" class=\"alert-link\"> A ticket with ID: # $ticket->ticket_id has been opened.</a>");
    }



}
