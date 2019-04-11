@extends('layouts.app')
@section('title', "| JSON Data")

@section('content')

<div class="col-sm-12" ref="products">
    <ul class="list-unstyled mt-2 mb-4">
        <li><a href="{{ route('main') }}" class="btn btn-outline-secondary">Main Page</a></li>
    </ul>
    <hr>
</div>

<div class="mb-5">
    <product-json route="{{ route('json.add') }}"></product-json>
</div>

<div class="col-sm-12" ref="products">

    @if(!$products)
        <h3>List is empty</h3>
    @else 

        @foreach($products as $product)

        <div class="card shadow mb-4">
            <h4 class="card-header">Name: {{ $product['name'] }}</h4>
            <div class="card-body">
                <div>Quantity: {{ $product['quantity'] }}</div>
                <div>Price: &dollar;{{ $product['price'] }}</div>
                <div>Total: &dollar;{{ $product['total'] }}</div>
                <div>Date: {{ $product['datetime'] }}</div>
            </div>
        </div>
            
        @endforeach

    @endif

</div>

@endsection