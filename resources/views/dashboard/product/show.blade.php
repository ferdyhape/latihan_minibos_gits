@extends('layouts.master')
@section('title', 'Product')
@section('content')
    <div class="d-flex justify-content-center">
        <div class="">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text mb-0">{{ $product->description }}</p>
                    <small>Stock: {{ $product->stock }}</small><br>
                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ $product->id }}/edit" class="btn btn-warning btn-sm px-4">Edit</a>
                        <form action="{{ $product->id }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm px-4"
                                onclick="return confirm('beneran mau hapus?')">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-primary d-block my-2">Back</a>
        </div>
    </div>
@endsection
