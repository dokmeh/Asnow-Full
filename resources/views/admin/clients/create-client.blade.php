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

                        <div>@foreach ($clients as $client)

                                <div class="dropdown">
                                    <a href="#"><h4 type="button"
                                                    data-toggle="collapse"
                                                    data-target="#{{ $client->id }}">{{ $client->name }}
                                            <span
                                                    class="fa fa-chevron-down"></span></h4></a>
                                    <ul id="{{ $client->id }}" class="collapse">

                                        <form action="/admin/client/{{ $client->id }}/edit" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="text" name="name" value="{{ $client->name }}"
                                                   placeholder="{{ $client->name }}">

                                            <input type="text" name="name_fa" value="{{ $client->name_fa }}"
                                                   placeholder="{{ $client->name_fa }}">
                                            <input type="url" name="url" value="{{ $client->url }}"
                                                   placeholder="{{ $client->url }}">&nbsp;
                                            @if (count($client->thumbnail) > 0)
                                                <img
                                                        class="avatar" src="{{ $client->thumbnail->thumbnail_path }}"
                                                        alt="">
                                            @else <br>
                                            <small>Add Thumbnail</small>
                                            <input type="file" placeholder="Website" name="file"><br>

                                            @endif
                                            <div class="btn-group">
                                                <button type="submit" class="btn btn-primary btn-xs">Update</button>
                                                <a href="/admin/client/{{ $client->id }}/deletebtn"
                                                   class="btn btn-danger btn-xs">Delete</a>
                                                @if (count($client->thumbnail) > 0)
                                                    <a class="btn btn-warning btn-xs"
                                                       href="/admin/client/thumbnail/{{  $client->thumbnail->id
                                                    }}/deletebtn">Delete Thumbnail</a>
                                                @endif</div>

                                        </form>

                                    </ul>
                                </div>

                            @endforeach
                        </div>
                        <div class="ln_solid"></div>
                        <div class="row">
                            <form action="/admin/client/create" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="col-md-6">
                                    <input type="text" placeholder="English Name" name="name" class="form-control"><br>
                                    <input type="text" placeholder="نام به فارسی" name="name_fa"
                                           class="form-control"><br>
                                    <input type="url" placeholder="Website" name="url" class="form-control">
                                    <br>
                                    Thumbnail:
                                    <input type="file" placeholder="Website" name="file" class="form-control">
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
