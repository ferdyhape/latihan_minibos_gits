@extends('layouts.master')
@section('title', 'Product')
@section('content')
    <div class="row justify-content-center">
        <div class="col-5 my-4">
            <form action="{{ url('dashboard/product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Name input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="form4Example1">Name</label>
                    <input type="text" id="form4Example1" class="form-control @error('name') is-invalid @enderror"
                        name="name" />
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="form4Example1">Stock</label>
                    <input type="number" id="form4Example1" class="form-control @error('stock') is-invalid @enderror"
                        name="stock" />
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
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="form4Example1">Choose a category</label>
                    <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                        name="category_id" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                        name="description"></textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Create</button>
            </form>
        </div>
    </div>
@endsection
