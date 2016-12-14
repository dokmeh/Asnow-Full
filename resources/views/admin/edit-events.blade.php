@extends('admin.layout')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    Edit Event #{{$event->id}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="/admin/events/{{$event->id}}/edit" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <input type="text" value="{{ $event->name }}" name="name" class="form-control"
                                   placeholder="{{ $event->name }}">

                            <textarea value="{{ $event->description }}" name="description" rows="3"
                                      class="form-control"
                                      placeholder="{{ $event->description }}">{{ $event->description }}</textarea>
                            <Br>
                            <input name="date" type="date" value="{{ $event->date }}" step="1"
                                   placeholder="{{ $event->date }}"/>

                            <br><br>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="/admin/events/{{ $event->id }}/edit" class="btn btn-default">Cancel</a>
                            <a href="/admin/events/{{ $event->id }}/deletebtn" class="btn btn-danger">Delete</a>


                        </form>
                        @if (count($event->photos) > 0)

                            <hr>
                            @foreach ($event->photos as $photo)
                                <img width="200px" src="{{ $photo->image }}" alt=""><a
                                        href="/admin/events/photo/{{ $photo->id }}/deletebtn"><i
                                            class="fa fa-times fa-3x"
                                            aria-hidden="true"></i></a>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        tinymce.get('description').setContent('{{ $event->description }}');
    </script>
@stop
