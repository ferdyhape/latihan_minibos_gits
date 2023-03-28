@extends('layouts.master')
@section('title', 'Category')
@section('content')
    <a href="{{ url('dashboard/category/create') }}" class="btn btn-success btn-sm mb-3">New Category</a>
    <div class="table-responsive">
        <table class="table">
            <caption>List of Categories</caption>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td class="d-flex justify-content-evenly">
                            <a href="category/{{ $category->id }}/edit" class="badge bg-warning"><i
                                    class="bi bi-pencil-square" style="font-size: 18px;"></i></a>
                            <form action="category/{{ $category->id }}" method="POST">
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
