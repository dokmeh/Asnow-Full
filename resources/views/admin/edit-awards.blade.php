@extends('admin.layout')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    Edit Event #{{$award->id}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="/admin/awards/{{ $award->id }}/update" method="POST"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{--{{ method_field('PATCH') }}--}}
                            <input type="text" value="{{ $award->name }}" name="name" class="form-control"
                                   placeholder="{{ $award->name }}">

                            <input type="text" value="{{ $award->name_fa }}" name="name_fa" class="form-control"
                                   placeholder="{{ $award->name_fa }}">
                            <strong>Upload an icon for this award</strong><input type="file" name="file">

                            <textarea value="{{ $award->description }}" name="description" rows="3"
                                      class="form-control"
                                      placeholder="{{ $award->description }}">{{ $award->description }}</textarea>
                            <Br>

                            <textarea value="{{ $award->description_fa }}" name="description_fa" rows="3"
                                      class="form-control"
                                      placeholder="{{ $award->description_fa }}">{{ $award->description_fa }}</textarea>
                            <Br>
                            <input name="date" type="date" value="{{ $award->date }}" step="1"
                                   placeholder="{{ $award->date }}"/>

                            <br><br>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="/admin/awards/{{ $award->id }}/edit" class="btn btn-default">Cancel</a>
                            <a href="/admin/awards/{{ $award->id }}/deletebtn" class="btn btn-danger">Delete</a>


                        </form>
                        @if (count($award->photo) > 0)

                            <hr>

                            <img width="100px" src="{{ $award->photo->image }}" alt=""><a
                                    href="/admin/project/award/photo/{{ $award->photo->id }}/deletebtn"><i
                                        class="fa fa-times fa-3x"
                                        aria-hidden="true"></i></a>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        tinymce.get('description').setContent('{{ $award->description }}');
        tinymce.get('description_fa').setContent('{{ $award->description_fa }}');
    </script>
@stop
