@extends('admin.layout')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Create Cooperator</h3>
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
                            <small>Second Step: Add the Photos</small>
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
                        <br/>


                        <h2 class="text-center">Cooperator Photos</h2><br>
                        <form action="/admin/cooperators/{{ $cooperator->id }}/photos" class="dropzone"
                              id="myAwesomeDropzone"
                              method="POST">
                            {{ csrf_field() }}
                            <div class="dz-message" data-dz-message><span>Drop cooperator's Photos here</span></div>
                            {{--<div id="preview-template" style="display: none;"></div>--}}

                        </form>

                        <h3 class="text-center">Thumbnails</h3>

                        <form action="/admin/cooperators/{{ $cooperator->id }}/thumbnails" class="dropzone"
                              id="myAwesomeDropzone"
                              method="POST">
                            {{ csrf_field() }}
                            <div class="dz-message" data-dz-message><span>Drop cooperator's Thumbnail here</span></div>

                        </form>


                        <div style="margin-top: 15px" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                            <a href="/admin/cooperators/{{ $cooperator->id }}" class="btn btn-success"> Done!
                            </a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



@stop
