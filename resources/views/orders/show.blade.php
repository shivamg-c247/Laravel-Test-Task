@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Details</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($data as $key => $value)
                    	<div>
                    		<p><b>Invoice Number: </b>{{$value->invoice_number}}</p>
                    		<p><b>Name: </b>{{$value->name}}</p>
                    		<p><b>Product Name: </b>{{$value->pname}}</p>
                    		<p><b>Price: </b>{{$value->price}}</p>
                    	</div><hr/>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
