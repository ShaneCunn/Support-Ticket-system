@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">File Uploads</div>

                    <div class="panel-body">
                        <!-- CSRF Token -->
                        <meta name="csrf-token" content="{{ csrf_token() }}">


                        <!-- Styles -->
                        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">

                            {{ config('app.name', 'Support ticket app') }}
                        </a>
                        <p>You are logged in!</p>

                        @if (Auth::user()->is_admin)
                            <p>
                                <a href="{{ url('admin/tickets') }}" class="btn btn-primary" role="button"> See all
                                    tickets</a>
                            </p>
                        @else
                            <p>
                                {{--   <a href="{{ url('my_tickets') }}" class="btn btn-primary" role="button">See all your
                                       tickets</a>
                                   <a href="{{ url('new_ticket') }}" class="btn btn-success" role="button">Open new ticket</a>--}}
                                <img src="{{Storage::disk()->url('avatars/WpL0nCcmtbVuggm9XRIUiMXz0e4qrM6E6qrMK6eC.png')}}">
                            <form method="POST" action="/avatars" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">

                                    <label for="email">File upload:</label>
                                    <input type="file" class="form-control" name="avatar" id="email">
                                </div>


                                <button type="submit" class="btn btn-default">Save File</button>
                            </form>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
