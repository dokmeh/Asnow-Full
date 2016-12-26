@extends('admin.layout')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Create Project</h3>
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
                            <small>Second Step: Persian Information</small>
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
                        <form id="demo-form2" action="/admin/project/{{ $project->id }}/edit" method="POST"
                              data-parsley-validate
                              class="form-horizontal form-label-left">
                            {{ csrf_field() }}
                            {{ method_field('PATCH')  }}
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">نام پروژه
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="title" name="title_fa" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="location">موقعیت:
                                    <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="location" name="location_fa" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="client" class="control-label col-md-3 col-sm-3 col-xs-12">
                                    کارفرما:</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="client" class="form-control  col-md-7 col-xs-12" type="text"
                                           name="client_fa">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">توضیحات: <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <textarea type="hidden" name="description_fa" title="description" id="description"
                                              style="display:block;"></textarea>
                                </div>
                            </div>


                        </form>

                        <div class="ln_solid"></div>
                        <h2 class="text-center">Project Photos</h2><br>
                        <form action="/admin/project/{{ $project->id }}/photos" class="dropzone" id="myAwesomeDropzone"
                              method="POST">
                            {{ csrf_field() }}
                            <div class="dz-message" data-dz-message><span>Drop project's Photos here</span></div>
                            {{--<div id="preview-template" style="display: none;"></div>--}}

                        </form>

                        <h3 class="text-center">Thumbnail</h3>
                        <h4 class="text-danger">Note: First choose the main thumbnail then choose the plan (Don't
                                                choose them multiple).</h4>
                        <form action="/admin/project/{{ $project->id }}/thumbnails" class="dropzone"
                              id="myAwesomeDropzone"
                              method="POST">
                            {{ csrf_field() }}
                            <div class="dz-message" data-dz-message><span>Drop project's Thumbnail here</span></div>

                        </form>


                        <div style="margin-top: 15px" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <a href="/admin/project/create/fa/{{ $project->id }}" class="btn btn-primary">Cancel</a>
                            <button type="submit" form="demo-form2" id="submit" value="submit"
                                    class="btn btn-success">
                                Submit
                            </button>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



@stop
