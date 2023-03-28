@extends('layouts.master')
@section('title', 'Product')
@section('content')
    <div class="row justify-content-center">
        <div class="col-5 my-4">
            <form action="{{ url('dashboard/product/' . $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- Name input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form4Example1">Name</label>
                    <input type="text" id="form4Example1" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ $product->name }}" />
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="form4Example1">Stock</label>
                    <input type="number" id="form4Example1" class="form-control @error('stock') is-invalid @enderror"
                        name="stock" value="{{ $product->stock }}" />
                    @error('stock')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <label for="formFileSm" class="form-label">Image</label>
                    <input type="file"
                        class="form-control form-control-sm form-control @error('image') is-invalid @enderror"
                        id="formFileSm" name="image">
                    <small class="w-100 text-muted">* Ignore if you don't want to change the image</small>
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <input type="hidden" name="old_image" value="{{ $product->image }}">

                <div class="form-outline mb-4">
                    <label class="form-label" for="form4Example1">Choose a category</label>
                    <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                        name="category_id" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Message input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form4Example3">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="form4Example3" rows="4"
                        name="description">{{ $product->description }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Edit</button>
            </form>
        </div>
    </div>
@endsection
