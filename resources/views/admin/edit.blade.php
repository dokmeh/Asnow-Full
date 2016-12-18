@extends('admin.layout')
@section('content')



    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Project #{{$project->id}}

                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="/admin/project/{{$project->id}}/edit" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <div class="col-md-6">
                                <input type="text" name="title" class="form-control" value="{{ $project->title }}"
                                       placeholder="{{ $project->title }}">

                                <input type="text" name="title_fa" class="form-control" value="{{ $project->title_fa }}"
                                       placeholder="{{ $project->title_fa }}">
                                <input type="text" name="client" value="{{ $project->client }}" class="form-control"
                                       placeholder="{{ $project->client }}">

                                <input type="text" name="client_fa" value="{{ $project->client_fa }}"
                                       class="form-control"
                                       placeholder="{{ $project->client_fa }}">
                                <input type="text" name="location" value="{{ $project->location }}" class="form-control"
                                       placeholder="{{ $project->location }}">
                                <input type="text" name="location_fa" value="{{ $project->location_fa }}"
                                       class="form-control"
                                       placeholder="{{ $project->location_fa}}">
                                <input type="number" value="{{ $project->site_area }}" name="site_area"
                                       class="form-control"
                                       placeholder="Site Area Meter...">
                                <input type="number" value="{{ $project->floor_area }}" name="floor_area"
                                       class="form-control"
                                       placeholder="Floor Area Meter...">


                                <select name="category_id" class="select2">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach

                                </select>

                                <select name="status_id" class="select2">
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">


                                <textarea id="description" name="description" rows="3" class="form-control"
                                          value="{{ $project->description }}"
                                          placeholder="{{ $project->description }}">{{ $project->description }}</textarea>

                                <textarea id="description_fa" name="description_fa" rows="3" class="form-control"
                                          value="{{ $project->description_fa }}"
                                          placeholder="{{ $project->description_fa }}">{{ $project->description_fa }}</textarea>
                                <Br>
                                <input name="design_at" value="{{ $project->design_at }}" type="number" min="1900"
                                       max="2099" step="1"
                                       placeholder="Designed At"/>
                                <input name="completed_at" value="{{ $project->completed_at }}" type="number" min="1900"
                                       max="2099" step="1"
                                       placeholder="Completed At"/>
                                <br><br>
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="/admin/project/{{ $project->id }}/edit" class="btn btn-default">Cancel</a>
                                <a href="/admin/project/{{ $project->id }}/deletebtn" class="btn btn-danger">Delete</a>
                            </div>

                        </form>

                    </div>
                    <hr>
                    <h2 class="text-center">Project Photos</h2><br>
                    <form action="/admin/project/{{ $project->id }}/photos" class="dropzone" id="my-awesome-dropzone"
                          method="POST">
                        {{ csrf_field() }}
                        <div class="dz-message" data-dz-message><span>Drop project's Photos here</span></div>

                    </form>
                    <br>
                    <h3 class="text-center">Thumbnail</h3>
                    <form action="/admin/project/{{ $project->id }}/thumbnails" class="dropzone"
                          id="my-awesome-dropzone"
                          method="POST">
                        {{ csrf_field() }}
                        <div class="dz-message" data-dz-message><span>Drop project's Thumbnail here</span></div>

                    </form>
                    @if (count($project->photos) > 0)

                        <hr>
                        @foreach ($project->photos as $photo)
                            <img width="200px" src="{{ $photo->image }}" alt=""><a
                                    href="/admin/project/photo/{{ $photo->id }}/deletebtn"><i
                                        class="fa fa-times fa-3x"
                                        aria-hidden="true"></i></a>
                        @endforeach
                    @endif

                    @if (count($project->awards) > 0)
                        <hr>
                        <h2>Awards:</h2>
                    @endif

                    @foreach ($project->awards as $award)

                        <h3>{{ $award->name }}</h3>
                        <p>{!! $award->description !!}</p>
                        @if (count($award->photo) > 0)
                            <img width="100px" src="{{ $award->photo->image }}" alt=""><a
                                    href="/admin/project/award/photo/{{ $award->photo->id }}/deletebtn"><i
                                        class="fa fa-times fa-3x"
                                        aria-hidden="true"></i></a>
                        @endif
                        <button id="show" class="btn btn-success">Edit This Award</button>
                        <div id="award-edit">
                            <button id="hide" class="btn btn-danger">Close this form</button>
                            <form action="/admin/project/awards/{{ $award->id }}/edit" method="POST"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="text" name="name" value="{{ $award->name }}" class="form-control"
                                       placeholder="{{ $award->name }}">

                                <input type="text" name="name_fa" value="{{ $award->name_fa }}" class="form-control"
                                       placeholder="{{ $award->name_fa }}">
                                <input name="date" value="{{ $award->date }}" type="number" min="1900"
                                       max="2099"
                                       step="1"
                                       placeholder="{{ $award->date }}"/><br>
                                <strong>Upload an icon for this award</strong><input type="file" name="file">
                                <textarea id="award-description" value="{{ $award->description }}"
                                          name="description"
                                          rows="1" class="form-control"
                                          placeholder="{{ $award->description }}">{{ $award->description }}</textarea><br>

                                <textarea id="award-description_fa" value="{{ $award->description_fa }}"
                                          name="description_fa"
                                          rows="1" class="form-control"
                                          placeholder="{{ $award->description_fa }}">{{ $award->description_fa }}</textarea><br>
                                <button type="submit" class="btn btn-primary">Save Award</button>
                                <a href="/admin/project/{{ $project->id }}/edit"
                                   class="btn btn-default">Cancel</a>
                                <a href="/admin/project/award/{{ $award->id }}/deletebtn" class="btn btn-danger">Delete
                                                                                                                 Award</a>

                            </form>
                            <script>
                                tinymce.get('award-description_fa').setContent('{{ $award->description_fa }}');

                            </script>
                        </div>


                    @endforeach



                    @if (count($project->publications) > 0)
                        <hr>
                        <h2>Publications:</h2>
                    @endif

                    @foreach ($project->publications as $publication)

                        <h3>{{ $publication->name }}</h3>
                        <p>{!! $publication->description !!}</p>
                        @foreach ($publication->files as $file)
                            <a href="{{ $file->path }}">Download the publication file.</a><a
                                    href="/admin/project/publications/file/{{ $file->id }}/deletebtn"><i
                                        class="fa fa-times fa-3x"
                                        aria-hidden="true"></i></a>
                        @endforeach
                        <button id="show-publication" class="btn btn-success">Edit This Publications</button>
                        <div id="publication-edit">
                            <button id="hide-publication" class="btn btn-danger">Close this form</button>
                            <form action="/admin/project/publications/{{ $publication->id }}/edit" method="POST"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="text" name="name" value="{{ $publication->name }}" class="form-control"
                                       placeholder="{{ $publication->name }}">

                                <input type="text" name="name_fa" value="{{ $publication->name_fa }}"
                                       class="form-control"
                                       placeholder="{{ $publication->name_fa }}">

                                <strong>Upload a file for this publication</strong><input type="file" name="file">
                                <textarea id="publication-description" value="{{ $publication->description }}"
                                          name="description"
                                          rows="1" class="form-control"
                                          placeholder="{{ $publication->description }}">{{ $publication->description }}</textarea><br>

                                <textarea id="publication-description_fa" value="{{ $publication->description_fa }}"
                                          name="description_fa"
                                          rows="1" class="form-control"
                                          placeholder="{{ $publication->description_fa }}">{{ $publication->description_fa }}</textarea><br>
                                <button type="submit" class="btn btn-primary">Save Publication</button>
                                <a href="/admin/project/{{ $project->id }}/edit"
                                   class="btn btn-default">Cancel</a>
                                <a href="/admin/project/publications/{{ $publication->id }}/deletebtn"
                                   class="btn btn-danger">Delete
                                                          Publication</a>

                            </form>
                            <script>
                                tinymce.get('publication-description_fa').setContent('{{ $publication->description_fa }}');

                            </script>

                        </div>
                </div>


                @endforeach

            </div>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function () {
            $("#award-edit").hide();
            $("#publication-edit").hide();

            $("#show").click(function () {
                $("#award-edit").show();
                $("#show").hide();
            });


            $("#hide").click(function () {
                $("#award-edit").hide();
                $("#show").show();

            });


            $("#show-publication").click(function () {
                $("#publication-edit").show();
                $("#show-publication").hide();
            });


            $("#hide-publication").click(function () {
                $("#publication-edit").hide();
                $("#show-publication").show();

            });

        });

    </script>
    <script>
        tinymce.get('description').setContent('{{ $project->description }}');
        tinymce.get('description_fa').setContent('{{ $project->description_fa }}');
    </script>
@stop
