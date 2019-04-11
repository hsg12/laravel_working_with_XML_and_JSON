@extends('layouts.app')
@section('title', "| Home")

@section('content')

<div class="col-sm-12">
    <h3>Working with JSON and XML Data</h3>

    <ul class="list-unstyled mt-4">
        <li><a href="{{ route('json') }}">JSON Data</a></li>
        <li><a href="{{ route('xml') }}">XML Data</a></li>
    </ul>
</div>

@endsection