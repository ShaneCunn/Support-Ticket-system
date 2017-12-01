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
                            <div class="panel-heading"><h2>Laravel 5.5 image upload example</h2></div>

                            <div class="panel-body">


                                @if ($message = Session::get('success'))

                                    <div class="alert alert-success alert-block">

                                        <button type="button" class="close" data-dismiss="alert">×</button>

                                        <strong>{{ $message }}</strong>

                                    </div>

                                    <img src="images/{{ Session::get('image') }}">

                                @endif


                                @if (count($errors) > 0)

                                    <div class="alert alert-danger">

                                        <strong>Whoops!</strong> There were some problems with your input.

                                        <ul>

                                            @foreach ($errors->all() as $error)

                                                <li>{{ $error }}</li>

                                            @endforeach

                                        </ul>

                                    </div>

                                @endif


                                {!! Form::open(array('route' => 'image.upload.post','files'=>true)) !!}

                                <div class="row">

                                    <div class="col-md-6">

                                        {!! Form::file('image', array('class' => 'form-control')) !!}

                                    </div>

                                    <div class="col-md-6">

                                        <button type="submit" class="btn btn-success">Upload</button>

                                    </div>

                                </div>

                                {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
