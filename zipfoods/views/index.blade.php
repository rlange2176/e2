@extends('templates.master')

@section('head')
<link href='/css/index.css' rel='stylesheet'>
@endsection

@section('title')
{{ $welcome }}
@endsection

@section('content')

<h2>Welcome!</h2>

<p>
    {{ $app->config('app.name') }} is your one-stop-shop for convenient online grocery shopping in the greater Boston
    area.
</p>

<p>
    <a href='/products'>Check out our selection of products...</a>
</p>

@endsection