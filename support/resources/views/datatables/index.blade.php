@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-ticket"> Tickets</i></div>

                    <div class="panel-body">
                        <table class="table table-bordered" id="users-table">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Category</th>
                                <th>title</th>
                                <th>status</th>
                                <th>Updated at</th>

                            </tr>
                            </thead>
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

        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatables.data') !!}',
            columns: [
                {data: 'id', name: 'id'},
               {data: 'name', name: 'categories.name'},
                {data: 'title', name: 'title'},
                {data: 'status', name: 'status'},
                {data: 'updated_at', name: 'updated_at'}
            ],
            initComplete: function () {
                this.api().columns().every(function () {
                    var column = this;
                    var input = document.createElement("input");
                    $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
                });
            }
        });
    </script>
@endsection
