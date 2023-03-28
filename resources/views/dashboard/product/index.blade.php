@extends('layouts.master')
@section('title', 'Product')
@section('content')
    <a href="{{ url('dashboard/product/create') }}" class="btn btn-success btn-sm mb-3">New Product</a>
    <div class="table-responsive">
        <table class="table">
            <caption>List of Products</caption>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td class="d-flex justify-content-evenly">
                            <a href="product/{{ $product->id }}" class="badge bg-success"><i class="bi bi-eye-fill"
                                    style="font-size: 18px;"></i></a>
                            <a href="product/{{ $product->id }}/edit" class="badge bg-warning"><i
                                    class="bi bi-pencil-square" style="font-size: 18px;"></i></a>
                            <form action="product/{{ $product->id }}" method="POST">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('beneran mau hapus?')"><i
                                        class="bi bi-trash" style="font-size: 18px;"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
