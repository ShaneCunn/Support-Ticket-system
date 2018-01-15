@extends('layouts.app')

@section('title', $ticket->title)

@section('content')
    <!-- TODO: Make rows sortable -->.
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2> {{ $ticket->ticket_id }} - {{ $ticket->title }}<span class="pull-right">
                               @if ($ticket->status === 'Open')
                                <form action="{{ url('admin/close_ticket/' . $ticket->ticket_id) }}"
                                      method="POST">
                               {!! csrf_field() !!}
                                    <button type="submit" class="btn btn-success">Mark Complete</button>
                                    <button type="button" class="btn btn-info"
                                            data-toggle="modal"
                                            data-target="#ticket-edit-modal">Edit</button>
                                   <a href="#test" class="btn btn-danger deleteit" form="delete-ticket-73">Delete</a>
                               </form>

                            @else
                                <form action="{{ url('admin/close_ticket/' . $ticket->ticket_id) }}"
                                      method="POST">
                               {!! csrf_field() !!}
                                    <button type="submit" class="btn btn-success">Reopen Ticket</button>
                                    <button type="button" class="btn btn-info"
                                            data-toggle="modal"
                                            data-target="#ticket-edit-modal">Edit</button>
                                   <a href="#test" class="btn btn-danger deleteit" form="delete-ticket-73">Delete</a>
                               </form>

                            @endif



                       </span></h2>
                </div>

                <div class="panel-body">
                    @include('includes.flash')

                    <div class="ticket-info">
                        <div class="panel well well-sm">
                            <p>Category: {{ $category->name }}</p>
                            <p>
                                @if ($ticket->status === 'Open')
                                    Status: <span class="label label-success">{{ $ticket->status }}</span>
                                @else
                                    Status: <span class="label label-danger">{{ $ticket->status }}</span>
                                @endif
                            </p>
                            <p>Priority:

                                @if($ticket->priority==='low')
                                    <?php $colourspan = "label-info"?>
                                @elseif($ticket->priority==='medium')
                                    <?php $colourspan = "label-warning"?>
                                @elseif($ticket->priority==='high')
                                    <?php $colourspan = "label-danger"?>
                                @endif
                                <span class="label {{$colourspan}}"> {{ucfirst($ticket->priority)}}</span>
                            </p>
                            <p>Created on: {{ $ticket->created_at->diffForHumans() }}</p>
                        </div>
                        <p>{!!  $ticket->message !!}</p>
                        <?php  $imageTicket = $ticket->image  ?>
                        {{--   assign image field to variable so it can be check to see if it is empty --}}
                        @if(!is_null($imageTicket))


                            <ul class="thumbnails">
                                <li class="img-responsive img-thumbnail"><a
                                            href="{{ asset('images/tickets/'. $ticket->image) }}"><img
                                                src="{{ asset('images/tickets/'. $ticket->image) }}"
                                                height="71"/></a>
                                </li>
                            </ul>
                        @endif
                    </div>

                    <hr>
                    <div class="comments">
                        @foreach ($comments as $comment)
                            <div class="panel panel-@if($ticket->user->id === $comment->user_id){{"default"}}@else{{"success"}}@endif">
                                <div class="panel panel-heading">
                                    {{ ucfirst($comment->user->name) }}
                                    <span class="pull-right">{{ $comment->created_at->format('Y-m-d') }}</span>
                                </div>

                                <div class="panel-body">
                                    <div class="content">
                                        <p>
                                            {!! $comment->comment !!}
                                        </p>
                                    </div>
                                    @if($errors->has('comment'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                    @endif

                                    <?php $imageLoad = $comment->image ?>
                                    {{--   assign image field to variable so it can be check to see if it is empty --}}
                                    @if(!is_null($imageLoad))
                                        <br/>

                                        <ul class="thumbnails">
                                            <li class="img-responsive img-thumbnail"><a
                                                        href="{{ asset('images/comments/'. $comment->image) }}"><img
                                                            src="{{ asset('images/comments/'. $comment->image) }}"
                                                            height="71"/></a>
                                            </li>
                                        </ul>


                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="comment-form">
                        <form action="{{ url('comment') }}" method="POST" class="form" enctype="multipart/form-data">
                            {!! csrf_field() !!}

                            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                            <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                <label for="comment">Comment:</label>
                                <textarea rows="10" id="comment" class="form-control" name="comment"></textarea>

                                @if ($errors->has('comment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('comment_image') ? ' has-error' : '' }}">{{Form::label('comment_image', 'Attach image:')}}
                                {{Form::file('comment_image')}}</div>

                            @if ($errors->has('comment_image'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('comment_image') }}</strong>
                                    </span>
                            @endif
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection