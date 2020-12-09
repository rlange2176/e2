@extends('templates.master')

@section('title')
Jackpot | Project 3 | Becca Lange
@endsection

@section('content')

<h2>Instructions</h2>
<ul>
    <li>You are Player 1. Select your fruit.</li>
    <li>The House selects fruits 2 and 3.</li>
    <li>Bananas are worth $100, cherries are $50, apples are $40, and lemons are $25. The
        total of the fruits displayed makes up the Jackpot.</li>
    <li>If all 3 cards match, you win the Jackpot! If not, The House keeps the Jackpot.
    </li>
</ul>
<form method='POST' action='/play'>
    <label for='fruit1'>Select your fruit:</label>
    <select id='fruit1' name='fruit1'>
        <option>Choose One</option>
        <option>Banana</option>
        <option>Apple</option>
        <option>Cherry</option>
        <option>Lemon</option>
    </select>
    <button type='submit'>Run Slot Machine</button>
</form>
@if($app->errorsExist())
<ul class='error alert alert-danger'>
    @foreach($app->errors() as $error)
    <li class='error'>You must select a fruit.</li>
    @endforeach
</ul>
@endif

@if($results)
<p>You selected {{ $results['fruit1'] }}. The House selected {{ $results['fruit2'] }} and {{ $results['fruit3'] }}.</p>
<p><strong>{{ $results['winner'] }} won ${{ $results['jackpot'] }}.</strong></p>
<p>Play again!</p>
@endif
<p><a href="/history">View Game history</a></p>
@endsection
