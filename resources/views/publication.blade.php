@extends('layout')
@section('content')
    <div class="event-container">
        <div class="event-row">
            <div class="event-col-1">
                <h2 class="event-title">{{ $publication->name }}</h2>
                {{--<p class="event-date">2016/06/21</p>--}}
                <p class="event-text">
                    {!! $publication->description !!}

                    Files:
                    @foreach ($publication->files as $file)

                        <a href="{{ $file->path }}"
                           class="event-img">{{ $file->path }}</a>
                    @endforeach
                </p>

            </div>

        </div>
    </div>

@stop
