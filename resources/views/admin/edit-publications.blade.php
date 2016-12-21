@extends('admin.layout')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    Edit Publication #{{$publication->id}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="/admin/publications/{{ $publication->id }}/update" method="POST"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{--{{ method_field('PATCH') }}--}}
                            <input type="text" value="{{ $publication->name }}" name="name" class="form-control"
                                   placeholder="{{ $publication->name }}">

                            <input type="text" value="{{ $publication->name_fa }}" name="name_fa" class="form-control"
                                   placeholder="{{ $publication->name_fa }}">
                            <strong>Upload an icon for this award</strong><input type="file" name="file">

                            <textarea value="{{ $publication->description }}" name="description" rows="3"
                                      class="form-control"
                                      placeholder="{{ $publication->description }}">{{ $publication->description }}</textarea>
                            <Br>

                            <textarea value="{{ $publication->description_fa }}" name="description_fa" rows="3"
                                      class="form-control"
                                      placeholder="{{ $publication->description_fa }}">{{ $publication->description_fa }}</textarea>
                            <Br>
                            <input name="date" type="date" value="{{ $publication->date }}" step="1"
                                   placeholder="{{ $publication->date }}"/>

                            <br><br>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="/admin/publications/{{ $publication->id }}/edit" class="btn btn-default">Cancel</a>
                            <a href="/admin/publications/{{ $publication->id }}/deletebtn"
                               class="btn btn-danger">Delete</a>


                        </form>

                        <hr>

                        @foreach ($publication->files as $file)
                            <a href="{{ $file->path }}">Download the publication file.</a><a
                                    href="/admin/project/publications/file/{{ $file->id }}/deletebtn"><i
                                        class="fa fa-times fa-3x"
                                        aria-hidden="true"></i></a>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        tinymce.get('description').setContent('{{ $publication->description }}');
        tinymce.get('description_fa').setContent('{{ $publication->description_fa }}');
    </script>
@stop
