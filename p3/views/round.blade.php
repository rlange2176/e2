@extends('templates.master')

@section('title')
Round {{ $round['id'] }} | Project 3 | Becca Lange


@endsection

@section('content')
<h2>Round {{ $round['id'] }} Details</h2>
<ul>
    <li>Your fruit: {{ $round['fruit1'] }}</li>
    <li>House fruits: {{ $round['fruit2'] }} and {{ $round['fruit3'] }}</li>
    <li>Winner: {{ $round['winner'] }}</li>
    <li>Jackpot: ${{ $round['jackpot'] }}</li>
</ul>

<p><a href='/history'>Return to all games history</a>.</p>
@endsection
