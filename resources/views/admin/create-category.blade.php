@extends('admin.layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Add a new Category
                </div>
                <div class="card-body">
                    <h3>List of Categories:</h3>
                    <ul>@foreach ($categories as $category)
                            <li>{{ $category->name }}</li>
                            <form action="/admin/category/{{ $category->id }}/edit" method="POST">
                                {{ csrf_field() }}
                                <input type="text" name="name" value="{{ $category->name }}"
                                       placeholder="{{ $category->name }}">
                                <button type="submit" class="btn btn-primary btn-xs">Update</button>
                                <a href="/admin/category/{{ $category->id }}/deletebtn" class="btn btn-danger btn-xs">Delete</a>

                            </form>
                        @endforeach
                    </ul>
                    <div class="row">
                        <form action="/admin/category/create" method="POST">
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Category Name">

                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>

                        </form>


                    </div>
                </div>
            </div>
        </div>
@stop
