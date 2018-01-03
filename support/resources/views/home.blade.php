@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#">Home</a></li>


                            @if (Auth::user()->is_admin)
                                <li>
                                    <a href="{{ url('admin/tickets') }}"> See all
                                        tickets</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ url('my_tickets') }}">See all your
                                        tickets</a></li>
                                <li><a href="{{ url('new_ticket') }}">Open new ticket</a>
                                </li>

                            @endif
                        </ul>
                    </div>

                    <div class="panel-body">
                        <!-- CSRF Token -->
                        <meta name="csrf-token" content="{{ csrf_token() }}">


                        <title>{{ config('app.name', 'Support ticket app') }}</title>

                        <!-- Styles -->
                        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
                        <div class="panel-heading"><a href="{{ url('/') }}">

                                {{ config('app.name', 'Support ticket app') }}
                            </a></div>
                        <div class="panel-body">

                            <!-- Branding Image -->

                            <p>You are logged in!</p>
                          
                        </div>
                        @if (Auth::user()->is_admin)
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-lg-offset-1">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-xs-3" style="font-size: 5em;">
                                                    <i class="glyphicon glyphicon-th"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <h1>{{ \App\Ticket::count() }}</h1>
                                                    <div>Total tickets</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <div class="panel panel-danger">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-xs-3" style="font-size: 5em;">
                                                    <i class="glyphicon glyphicon-wrench"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <h1>{{ \App\Ticket::where('status','=','Open')->count() }}</h1>
                                                    <div>Open tickets</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-xs-3" style="font-size: 5em;">
                                                    <i class="glyphicon glyphicon-thumbs-up"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <h1>{{ \App\Ticket::where('status','=','Closed')->count() }}</h1>
                                                    <span>Closed tickets</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
