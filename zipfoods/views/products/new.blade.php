@extends('templates.master')

@section('title')
{{ $product['name'] }}
@endsection

@section('content')

@if($app->errorsExist())
<ul class='error alert alert-danger'>
    @foreach($app->errors() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@elseif($confirmationName)

<div class='alert alert-success'>
    Product added successfully.

</div>
@endif


<form method='POST' id='new-product' action='/products/new'>
    <h3>Upload Your Product</h3>
    <input type='hidden' name='id' value='{{ $product["id"] }}'>
    <div class='form-group'>
        <label for='name'>Product Name</label>
        <input type='text' class="form-control" name='name' id='name' value='{{ $app->old('name') }}'>
    </div>
    <div class='form-group'>
        <label for='description'>Description</label>

        <input type='text' class="form-control" name='description' id='description' value='{{ $app->old('description') }}'>

    </div>
    <div class='form-group'>
        <label for='price'>Price</label>
        <input type='number' class="form-control" name='price' id='price' value='{{ $app->old('price') }}'>



    </div>
    <div class='form-group'>
        <label for='available'>Availability</label>
        <input type='text' class="form-control" name='available' id='available' value='{{ $app->old('available') }}'>



    </div>
    <div class='form-group'>
        <label for='weight'>Weight</label>
        <input type='number' class="form-control" name='weight' id='weight' value='{{ $app->old('weight') }}'>



    </div>
    <div class='form-group'>
        <label for='perishable'>Perishable</label>
        <input type='number' max="1" class="form-control" name='perishable' id='perishable' value='{{ $app->old('perishable') }}'>



    </div>


    <button type='submit' class='btn btn-primary'>Submit Review</button>
</form>

<a href='/products'>&larr; Return to all products</a>

@endsection
