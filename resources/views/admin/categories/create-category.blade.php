@extends('admin.layout')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Categories</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List of Categories:</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div>@foreach ($categories as $category)

                                <div class="dropdown">
                                    <a href="#"><h4 type="button"
                                                    data-toggle="collapse"
                                                    data-target="#{{ $category->name }}">{{ $category->name }}
                                            <span
                                                    class="fa fa-chevron-down"></span></h4></a>
                                    <ul id="{{ $category->name }}" class="collapse">

                                        <form action="/admin/category/{{ $category->id }}/edit" method="POST">
                                            {{ csrf_field() }}
                                            <input type="text" name="name" value="{{ $category->name }}"
                                                   placeholder="{{ $category->name }}">

                                            <input type="text" name="name_fa" value="{{ $category->name_fa }}"
                                                   placeholder="{{ $category->name_fa }}">
                                            <div class="btn-group">
                                                <button type="submit" class="btn btn-primary btn-xs">Update</button>
                                                <a href="/admin/category/{{ $category->id }}/deletebtn"
                                                   class="btn btn-danger btn-xs">Delete</a></div>

                                        </form>

                                    </ul>
                                </div>

                            @endforeach
                        </div>
                        <div class="row">
                            <form action="/admin/category/create" method="POST">
                                {{ csrf_field() }}
                                <div class="col-md-6">
                                    <input type="text" placeholder="English Name" name="name" class="form-control"><br>
                                    <input type="text" placeholder="نام به فارسی" name="name_fa" class="form-control">
                                    <br>
                                    <button type="submit" class="btn btn-primary">Save</button>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
