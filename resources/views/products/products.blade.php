@extends('layouts.customapp')

@section('content')

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <div class="container custom-cont" id="withoutStatus">
        <div class="row">
            <div class="col-md-6">
                <h2>List of Products</h2>        
            </div>
            <div class="col-md-6 text-right">
                <h4>Check Status </h4>
                <label class="switch"> <input type="checkbox" name="toggle" id="toggle" data-toggle="toggle" data-off="Disabled" data-on="Enabled"> <span class="slider"></span> </label>        
            </div>
        </div>
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

    <div class="container custom-cont" id="withStatus">
        <div class="row">
            <div class="col-md-6">
                <h2>List of Products</h2>        
            </div>
            <div class="col-md-6 text-right">
                <h4>Check Status </h4>
                <label class="switch"> <input type="checkbox" name="toggle" id="toggle" data-toggle="toggle" data-off="Disabled" data-on="Enabled"> <span class="slider"></span> </label>        
            </div>
        </div>
        <table class="table table-bordered" id="productsDataStatus">
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
            $('#withStatus').hide();
            $('#productsData').DataTable({
                processing: true,
                serverSide: true,
                $ajax: "{{ url('productslist') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'price', name: 'price' },
                    { data: 'status', name: 'status' },
                ]
            });
        });

        $('#toggle').change(function(){
            var mode = $(this).prop('checked');
            var formData = { mode: mode };
            $.ajax({
                type: "GET",
                // url: '{{ url("/products/productsliststatus") }}',
                url: '/products/dashboard/status',
                data: formData,
                dataType: 'json',
                success: function (data) {
                    $('#withoutStatus').hide();
                    $('#withStatus').show();
                    $('#productsDataStatus').DataTable({
                        processing: true,
                        serverSide: true,
                        columns: [
                            { data: 'id', name: 'id' },
                            { data: 'name', name: 'name' },
                            { data: 'price', name: 'price' },
                            { data: 'status', name: 'status' },
                        ]
                    });
                },
                error: function (data) {
                    console.log(data);
                }
            });

        });
    </script>
@endsection