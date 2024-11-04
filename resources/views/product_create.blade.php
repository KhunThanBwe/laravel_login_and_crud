@extends('layouts.app')

@section('content')


<div class="container">

    @if(session('error'))
        <span>{{ session('error') }}</span>
    @endif
    
    <form action="{{ route('store_product') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
            <div class="error">
                @error('name')
                    <span>{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" id="price" value="{{ old('price') }}">
            <div class="error">
                @error('price')
                    <span>{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
            <div class="error">
                @error('description')
                    <span>{{ $message }}</span>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Create</button>

    </form>


</div>

@endsection