<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ticket;
use App\Comment;
use App\Mailers\AppMailer;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CommentsController extends Controller
{
    //

    public function postComment(Request $request, AppMailer $mailer)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);


        $commentimage = new Comment();


        if ($request->hasFile('comment_image')) {

            $image = $request->file('comment_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/comments/' . $filename);
            Image::make($image)->fit(800)->save($location);
            $commentimage->image = $filename;
            $comment = Comment::create([
                'ticket_id' => $request->input('ticket_id'),
                'user_id' => Auth::user()->id,
                'comment' => $request->input('comment'),
                'image' => $filename

            ]);


        } else {

            $comment = Comment::create([
                'ticket_id' => $request->input('ticket_id'),
                'user_id' => Auth::user()->id,
                'comment' => $request->input('comment'),

            ]);
        }


        // saves our image to database
        if ($request->hasFile('comment_image')) {
            $image = $request->file('comment_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/comments/' . $filename);
            Image::make($image)->fit(800)->save($location);
            $comment->image = $filename;

        }
        // send mail if the user commenting is not the ticket owner
        if ($comment->ticket->user->id !== Auth::user()->id) {
            $mailer->sendTicketComments($comment->ticket->user, Auth::user(), $comment->ticket, $comment);
        }

        return redirect()->back()->with("status", "Your comment has be submitted.");
    }
}
