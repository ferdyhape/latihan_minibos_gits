@extends('layouts.master')
@section('title', 'Product')
@section('content')
    <div class="row justify-content-center">
        <div class="col-5 my-4">
            <form action="{{ url('dashboard/category') }}" method="POST">
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
