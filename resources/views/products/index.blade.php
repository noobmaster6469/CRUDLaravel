@extends('layouts.app')
@section('main')

<div class="container">
    <div class="text-right">
        <a href="/products/create" class="btn btn-dark mt-2">New Product</a>
    </div>

    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td><a href="/products/show/{{ $product->id }}" class="text-dark">{{ $product->name }}</a></td>
                    <td><img src="products/{{ $product->image }}" class="rounded-circle" width="50px" height="50px"></td>
                    <td>
                        <a href="/products/edit/{{ $product->id }}" class="btn btn-primary">Edit</a>
                        <form action="/products/delete/{{ $product->id }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>

        </table>
        {{ $products->links() }}
    </div>
</div>

@endsection