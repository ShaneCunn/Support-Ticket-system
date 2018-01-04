@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Customers</div>

                    <div class="panel-body">
                        <table class="table" id="datatable">
                            <thead>
                            <tr>
                                <th>category id</th>
                                <th>ticket id</th>
                                <th>title</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                            @foreach ($tickets as $ticket)
                                    <td>{{ $ticket->category_id }}</td>
                                    <td>{{ $ticket->ticket_id }}</td>
                                    <td>{{ $ticket->title }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        });

    </script>
@endsection
