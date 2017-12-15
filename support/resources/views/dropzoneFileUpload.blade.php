@extends('layouts.app')

@section('title', 'File upload')

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
                        <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">

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

                            <h3>Laravel 5.5 - multiple images uploading using dropzone js</h3>

                    <form>
                            {!! Form::open([ 'route' => [ 'dropzone.fileupload' ], 'files' => true, 'class' => 'dropzone','id'=>"image-upload"]) !!}

                            {!! Form::close() !!}



                            </form>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
