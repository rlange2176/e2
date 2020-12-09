@extends('templates.master')

@section('title')
Game History | Project 3 | Becca Lange
@endsection

@section('content')
<h2>Game History</h2>
<ul>
    @foreach($rounds as $round)
    <li><a href='/round?id={{ $round['id'] }}'>{{ $round['time'] }}</li>
    @endforeach
</ul>
<p><a href='/'>Return Home</a>.</p>

@endsection
