@extends('layouts.customapp')

@section('content')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <div class="container">
           <h2>List of all Customers</h2>
        <table class="table table-bordered" id="productsData">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>
            </thead>
        </table>
    </div>
    <script>
        $(document).ready( function () {
            $('#productsData').DataTable({
                processing: true,
                serverSide: true,
                $ajax: "{{ url('productslist') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'invoice_number', name: 'invoice_number' },
                    { data: 'total_amount', name: 'total_amount' },
                    { data: 'status', name: 'status' },
                ]
            });
        });
    </script>
@endsection