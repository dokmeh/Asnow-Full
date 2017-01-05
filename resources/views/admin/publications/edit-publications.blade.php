@extends('admin.layout')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Publication #{{ $publication->id }}</h3>
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

                        <h2>Edit Form

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
                        <form id="demo-form2" action="/admin/publications/{{ $publication->id }}/update" method="POST"
                              data-parsley-validate
                              class="form-horizontal form-label-left" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Publication's Name:
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{ $publication->name  }}" placeholder="{{ $publication->name  }}"
                                           type="text" id="name" name="name" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Publication's Name:
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{ $publication->name_fa  }}"
                                           placeholder="{{ $publication->name_fa  }}"
                                           type="text" id="name" name="name_fa" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Publication's File:
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" id="file" name="file"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Description: <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <textarea type="hidden" placeholder="{{ $publication->description }}"
                                              name="description" title="description" id="description"
                                              style="display:block;">{{ $publication->description  }}</textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Description: <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <textarea type="hidden" placeholder="{{ $publication->description_fa }}"
                                              name="description" title="description_fa" id="description"
                                              style="display:block;">{{ $publication->description_fa  }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Visibility</label>
                                <div>
                                    <div id="gender" class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-default" data-toggle-class="btn-primary"
                                               data-toggle-passive-class="btn-default">
                                            <input type="radio" name="visible" value="0"> &nbsp; Hide
                                                                                          &nbsp;
                                        </label>
                                        <label class="btn btn-default" data-toggle-class="btn-primary"
                                               data-toggle-passive-class="btn-default">
                                            <input type="radio" name="visible" value="1"> Show
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="/admin/publications/{{ $publication->id }}/edit"
                                       class="btn btn-primary">Cancel</a>
                                    <button type="submit" id="submit" value="submit" class="btn btn-success">Submit
                                    </button>
                                </div>
                            </div>

                        </form>

                        <div class="ln_solid"></div>
                        <h3>Files:</h3>
                        @foreach ($publication->files as $file)
                            <a style="text-decoration: none;" href="{{ $file->path }}">Download the publication
                                                                                       file.</a><a
                                    href="/admin/project/publications/file/{{ $file->id }}/deletebtn"><i
                                        class="fa fa-times fa-2x"
                                        aria-hidden="true"></i></a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>



@stop
