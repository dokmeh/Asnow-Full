@extends('admin.layout')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Project</h3>
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
                        <form action="/admin/project/{{$project->id}}/edit" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="title">Project's Name:
                                        <span class="required">*</span>
                                    </label>
                                    <div>
                                        <input type="text" id="title" value="{{ $project->title }}" name="title"
                                               placeholder="{{ $project->title }}"
                                               required="required"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="location">Location:
                                        <span
                                                class="required">*</span>
                                    </label>
                                    <div>
                                        <input type="text" value="{{ $project->location }}" id="location"
                                               name="location" placeholder="{{ $project->location }}"
                                               required="required"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="client" class="control-label">
                                        Client:</label>
                                    <div>
                                        <input id="client" value="{{ $project->client }}" class="form-control"
                                               type="text"
                                               name="client" placeholder="{{ $project->client }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Design At: <span
                                                class="required">*</span>
                                    </label>
                                    <div>
                                        <input name="design_at" id="birthday" placeholder="{{ $project->design_at }}"
                                               value="{{ $project->design_at }}"
                                               class="date-picker datetime form-control"
                                               required="required" type="text">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label  ">Completed At: <span
                                                class="required">*</span>
                                    </label>
                                    <div>
                                        <input value="{{ $project->completed_at }}" name="completed_at" id="birthday"
                                               class="date-picker datetime form-control"
                                               required="required" placeholder="{{ $project->completed_at }}"
                                               type="text">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label" for="floor-area">Floor
                                                                                  Area:
                                        <span
                                                class="required">*</span>
                                    </label>
                                    <div>
                                        <input type="number" value="{{ $project->floor_area }}" id="floor-area"
                                               name="floor_area" required="required"
                                               class="form-control" placeholder="{{ $project->floor_area }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="site-area">Site Area:
                                        <span
                                                class="required">*</span>
                                    </label>
                                    <div>
                                        <input type="number" value="{{ $project->site_area }}" id="site-area"
                                               name="site_area" required="required"
                                               class="form-control" placeholder="{{ $project->site_area }}">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label  " for="category">Category:
                                        <span
                                                class="required">*</span>
                                    </label>
                                    <div class="  ">
                                        <select id="category" name="category_id" class="form-control">
                                            <option value="{{ $project->category->id }}">{{ $project->category->name }}</option>

                                            @foreach ($categories as $category)

                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label  " for="status">Status:
                                        <span
                                                class="required">*</span>
                                    </label>
                                    <div class="  ">
                                        <select id="status" name="status_id" class="form-control">
                                            <option value="{{ $project->status->id }}">{{ $project->status->name }}</option>
                                            @foreach ($statuses as $status)

                                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label  ">Description: <span
                                                class="required">*</span>
                                    </label>
                                    <div class="  ">

                                                            <textarea type="hidden" name="description"
                                                                      title="description" id="description"
                                                                      style="display:block;"
                                                                      placeholder="{{ $project->description }}">{{ $project->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="title" class="control-label">
                                        نام پروژه:</label>
                                    <div>
                                        <input value="{{ $project->title_fa }}" placeholder="{{ $project->title_fa }}"
                                               id="title" class="form-control" type="text"
                                               name="title_fa">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="location" class="control-label">
                                        موقعیت:</label>
                                    <div>
                                        <input placeholder="{{ $project->location_fa }}"
                                               value="{{ $project->location_fa }}" id="location" class="form-control"
                                               type="text"
                                               name="location_fa">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="client" class="control-label">
                                        کارفرما:</label>
                                    <div class="  ">
                                        <input placeholder="{{ $project->client_fa }}" value="{{ $project->client_fa }}"
                                               id="client" class="form-control" type="text"
                                               name="client_fa">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label  ">توضیحات: <span
                                                class="required">*</span>
                                    </label>
                                    <div>

                                                            <textarea placeholder="{{ $project->description_fa }}"
                                                                      type="hidden" name="description_fa"
                                                                      title="description" id="description"
                                                                      style="display:block;">{{ $project->description_fa }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12">


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

                                        <a href="/admin/project/create" class="btn btn-primary">Cancel</a>
                                        <button type="submit" id="submit" value="submit" class="btn btn-success">
                                            Save
                                        </button>
                                        <a id="{{ $project->id }}" data-href="/admin/project/{{$project->id}}/deletebtn"
                                           class="btn btn-danger">Delete</a>
                                        <script>
                                            $('a#{{ $project->id }}').on('click', function () {
                                                swal({
                                                        title             : "Are you sure?",
                                                        text              : "You will not be able to recover this!",
                                                        type              : "warning",
                                                        showCancelButton  : true,
                                                        confirmButtonColor: "#DD6B55",
                                                        confirmButtonText : "Yes, delete it!",
                                                        closeOnConfirm    : false
                                                    },
                                                    function () {
                                                        href                 = $('#{{ $project->id }}').attr('data-href');
                                                        window.location.href = href;
                                                    });
                                            })
                                        </script>

                                    </div>
                                </div>
                            </div>


                        </form>

                        <hr>


                        @foreach ($project->photos as $photo)

                            <div class="col-md-55">
                                <div class="thumbnail">
                                    <div class="image view view-first">
                                        <img style="width: 100%; display: block;" src="{{ $photo->image }}"
                                             alt="image"/>
                                        <div class="mask">
                                            <p>{{ $photo->name }}</p>
                                            <div class="tools tools-bottom">

                                                <a href="/admin/project/photo/{{ $photo->id }}/deletebtn"><i
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


                        <div class="col-md-12"><h2 class="text-center">Project Photos</h2><br>
                            <form action="/admin/project/{{ $project->id }}/photos" class="dropzone"
                                  id="myAwesomeDropzone"
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
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



@stop
