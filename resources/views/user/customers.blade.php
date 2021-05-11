@extends('layouts.customapp')

@section('content')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <div class="container">
           <h2>List of all Customers</h2>
        <table class="table table-bordered" id="laravel_datatable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created at</th>
                </tr>
            </thead>
        </table>
    </div>
    <script>
        $(document).ready( function () {
            $('#laravel_datatable').DataTable({
                processing: true,
                serverSide: true,
                $ajax: "{{ url('customerslist') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at' },
                ]
            });
        });
    </script>
@endsection