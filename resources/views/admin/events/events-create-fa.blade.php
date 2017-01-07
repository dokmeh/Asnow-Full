@extends('admin.layout')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Create Event
                    <small>Second Step: Persian Information</small>
                </h3>
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

                        <h2>Create Form

                        </h2>
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


                        <h2 class="text-center">Event Photos</h2><br>
                        <form action="/admin/events/{{ $event->id }}/photos" class="dropzone" id="myAwesomeDropzone"
                              method="POST">
                            {{ csrf_field() }}
                            <div class="dz-message" data-dz-message><span>Drop event's Photos here</span></div>

                        </form>
                        <br>
                        <h3 class="text-center">Thumbnail</h3>
                        <form action="/admin/events/{{ $event->id }}/thumbnails" class="dropzone"
                              id="myAwesomeDropzone"
                              method="POST">
                            {{ csrf_field() }}
                            <div class="dz-message" data-dz-message><span>Drop event's Thumbnail here</span></div>

                        </form>
                        <br>
                        <a href="/admin/events/{{ $event->id }}" class="btn btn-primary">Done!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop
