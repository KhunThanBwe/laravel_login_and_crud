@extends('layouts.app')

@section('content')


<div class="container">

    @if(session('error'))
        <span>{{ session('error') }}</span>
    @endif
    
    <form action="{{ route('update_product', $product->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}">
            <div class="error">
                @error('name')
                    <span>{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" value="{{ $product->price }}">
            <div class="error">
                @error('price')
                    <span>{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description">{{ $product->description }}</textarea>
            <div class="error">
                @error('description')
                    <span>{{ $message }}</span>
                @enderror
            </div>
        </div>

        <button type="submit">Update</button>

    </form>


</div>

@endsection