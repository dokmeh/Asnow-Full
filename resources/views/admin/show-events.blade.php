@extends('admin.layout')
@section('content')

    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    {{ $event->name }}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>Description:</h4>
                            <p>{!! $event->description !!}</p>

                            <h4>Date:</h4>
                            <p>{{ $event->date}}</p>


                        </div>
                    </div>


                    <hr>
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
@stop
