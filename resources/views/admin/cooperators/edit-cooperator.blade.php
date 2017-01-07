@extends('admin.layout')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Cooperator</h3>
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
                        <form action="/admin/cooperators/{{$cooperator->id}}/edit" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="title">Cooperator's Name:
                                        <span class="required">*</span>
                                    </label>
                                    <div>
                                        <input type="text" id="title" value="{{ $cooperator->title }}" name="title"
                                               placeholder="{{ $cooperator->title }}"
                                               required="required"
                                               class="form-control">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label  " for="category">Category:
                                        <span
                                                class="required">*</span>
                                    </label>
                                    <div class="  ">
                                        <select id="category" name="category_id" class="form-control">
                                            <option value="{{ $cooperator->category->id }}">{{ $cooperator->category->name }}</option>

                                            @foreach ($categories as $category)

                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="title" class="control-label">
                                        نام پروژه:</label>
                                    <div>
                                        <input value="{{ $cooperator->title_fa }}"
                                               placeholder="{{ $cooperator->title_fa }}"
                                               id="title" class="form-control" type="text"
                                               name="title_fa">
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

                                        <a href="/admin/cooperators/{{$cooperator->id}}/edit" class="btn btn-primary">Cancel</a>
                                        <button type="submit" id="submit" value="submit" class="btn btn-success">
                                            Save
                                        </button>
                                        <a id="{{ $cooperator->id }}"
                                           data-href="/admin/cooperators/{{$cooperator->id}}/deletebtn"
                                           class="btn btn-danger">Delete</a>
                                        <script>
                                            $('a#{{ $cooperator->id }}').on('click', function () {
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
                                                        href                 = $('#{{ $cooperator->id }}').attr('data-href');
                                                        window.location.href = href;
                                                    });
                                            })
                                        </script>

                                    </div>
                                </div>
                            </div>


                        </form>

                        <hr>


                        @foreach ($cooperator->photos as $photo)

                            <div class="col-md-55">
                                <div class="thumbnail">
                                    <div class="image view view-first">
                                        <img style="width: 100%; display: block;" src="{{ $photo->image }}"
                                             alt="image"/>
                                        <div class="mask">
                                            <p>{{ $photo->name }}</p>
                                            <div class="tools tools-bottom">

                                                <a id="{{ $photo->id  }}"
                                                   data-href="/admin/cooperators/photo/{{ $photo->id }}/deletebtn"><i
                                                            class="fa fa-times"></i></a>


                                                <script>
                                                    $('a#{{ $photo->id   }}').on('click', function () {
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
                                                                href                 = $('#{{ $photo->id   }}').attr('data-href');
                                                                window.location.href = href;
                                                            });
                                                    })
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <p>{{ $photo->created_at }}</p>
                                    </div>
                                </div>
                            </div>


                        @endforeach


                        <div class="col-md-12"><h2 class="text-center">Cooperator Photos</h2><br>
                            <form action="/admin/cooperators/{{ $cooperator->id }}/photos" class="dropzone"
                                  id="myAwesomeDropzone"
                                  method="POST">
                                {{ csrf_field() }}
                                <div class="dz-message" data-dz-message><span>Drop cooperators's Photos here</span>
                                </div>
                                {{--<div id="preview-template" style="display: none;"></div>--}}

                            </form>

                            <h3 class="text-center">Thumbnail</h3>
                            <h4 class="text-danger">Note: First choose the main thumbnail then choose the plan (Don't
                                                    choose them multiple).</h4>
                            <form action="/admin/cooperators/{{ $cooperator->id }}/thumbnails" class="dropzone"
                                  id="myAwesomeDropzone"
                                  method="POST">
                                {{ csrf_field() }}
                                <div class="dz-message" data-dz-message><span>Drop cooperators's Thumbnail here</span>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



@stop
