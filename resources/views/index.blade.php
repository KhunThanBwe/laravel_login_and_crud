
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="header">
        <h3>Product List</h3>
    </div>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <div class="button-container">
        <a href="{{ route('product_create_form') }}">Create Product</a>
    </div>

    <div class="table-container">

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>name</th>
                    <th>price</th>
                    <th>description</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }} MMK</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <a href="{{ route('get_product', $product->id) }}">update</a>
                            <form action="{{ route('delete_product', $product->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit">delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>


</div>

@endsection