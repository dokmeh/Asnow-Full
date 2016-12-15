@extends('admin.layout')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    {{ $project->title }}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>Description:</h4>
                            <p>{!! $project->description !!}</p>

                            <h4>Client:</h4>
                            <p>{{ $project->client}}</p>

                            <h4>Address:</h4>
                            <p>{{ $project->location }}</p>


                        </div>


                        <div class="col-sm-6">

                            <h4>Designed At:</h4>
                            <p>{{ $project->design_at}}</p>

                            <h4>Completed At:</h4>
                            <p>{{ $project->completed_at }}</p>

                            Status: <span
                                    class="badge @if($project->status->name == 'Completed') badge-success @else badge-warning @endif
                                            badge-icon"><i
                                        class="fa @if ($project->status->name == 'Completed')
                                                fa-check
                                                                                        @else fa-clock-o @endif"
                                        aria-hidden="true"></i><span>{{ $project->status->name }}</span></span>

                            <p>Category: {{ $project->category->name }}</p>


                        </div>
                    </div>
                    <div class="row">

                        <h3 class="text-danger">This project achieved some awards?</h3>
                        <button id="show" class="btn btn-success">So add it</button>
                        <div id="award">
                            <button id="hide" class="btn btn-danger">Close this form</button>

                            <form action="/admin/project/{{ $project->id }}/awards" method="POST"
                                  enctype="multipart/form-data">

                                {{ csrf_field() }}
                                <input type="text" name="name" class="form-control" placeholder="Award's Name">
                                <input name="date" type="number" min="1900" max="2099" step="1"
                                       placeholder="Award's Achieved Year"/><br>
                                <strong>Upload an icon for this award</strong><input type="file" name="file">
                                <textarea name="description" rows="1" class="form-control"
                                          placeholder="Award's Description"></textarea><br>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>


                    <div class="row">

                        <h3 class="text-danger">This project published in any publication?!</h3>
                        <button id="show-publication" class="btn btn-success">So mention it</button>
                        <div id="publication">
                            <button id="hide-publication" class="btn btn-danger">Close this form</button>

                            <form action="/admin/project/{{ $project->id }}/publications" method="POST"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="text" name="name" class="form-control" placeholder="Publication's Name">

                                <strong>Upload a file for this publication</strong><input type="file" name="file">
                                <textarea name="description" rows="1" class="form-control"
                                          placeholder="Publication's Description"></textarea><br>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>


                    <hr>
                    <h2 class="text-center">Project Photos</h2><br>
                    <form action="/admin/project/{{ $project->id }}/photos" class="dropzone" id="myAwesomeDropzone"
                          method="POST">
                        {{ csrf_field() }}
                        <div class="dz-message" data-dz-message><span>Drop project's Photos here</span></div>
                        {{--<div id="preview-template" style="display: none;"></div>--}}

                    </form>
                    <br>
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
    <script>
        $(document).ready(function () {
            $("#award").hide();
            $("#publication").hide();

            $("#hide").click(function () {
                $("#award").hide();
                $("#show").show();

            });
            $("#show").click(function () {
                $("#award").show();
                $("#show").hide();
            });


            $("#hide-publication").click(function () {
                $("#publication").hide();
                $("#show-publication").show();

            });
            $("#show-publication").click(function () {
                $("#publication").show();
                $("#show-publication").hide();
            });
        });

    </script>

@stop
