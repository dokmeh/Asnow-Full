@extends('admin.layout')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Event #{{ $event->id }}</h3>
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
                        <form id="demo-form2" action="/admin/events/{{ $event->id }}/edit" method="POST"
                              data-parsley-validate
                              class="form-horizontal form-label-left" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Event's Name:
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{ $event->name  }}" placeholder="{{ $event->name  }}"
                                           type="text" id="name" name="name" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">نام جایزه:
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{ $event->name_fa  }}" placeholder="{{ $event->name_fa  }}"
                                           type="text" id="name" name="name_fa" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Date: <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input name="date" id="birthday"
                                           class="date-picker datetime form-control col-md-7 col-xs-12"
                                           required="required" type="text">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Description: <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <textarea type="hidden" placeholder="{{ $event->description }}"
                                              name="description" title="description" id="description"
                                              style="display:block;">{{ $event->description  }}</textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">توضیحات: <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <textarea type="hidden" placeholder="{{ $event->description_fa }}"
                                              name="description_fa" title="description" id="description"
                                              style="display:block;">{{ $event->description_fa  }}</textarea>
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

                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="/admin/events/{{ $event->id }}/edit"
                                       class="btn btn-primary">Cancel</a>
                                    <button type="submit" id="submit" value="submit" class="btn btn-success">Submit
                                    </button>
                                </div>
                            </div>

                        </form>

                        <hr>


                        @foreach ($event->photos as $photo)

                            <div class="col-md-55">
                                <div class="thumbnail">
                                    <div class="image view view-first">
                                        <img style="width: 100%; display: block;" src="{{ $photo->image }}"
                                             alt="image"/>
                                        <div class="mask">
                                            <p>{{ $photo->name }}</p>
                                            <div class="tools tools-bottom">

                                                <a href="/admin/events/photo/{{ $photo->id }}/deletebtn"><i
                                                            class="fa fa-times"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <p>{{ $photo->created_at }}</p>
                                    </div>
                                </div>
                            </div>


                        @endforeach
                        <div class="col-md-12">

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


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



@stop
