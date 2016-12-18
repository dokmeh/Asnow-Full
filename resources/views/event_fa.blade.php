@extends('layout_fa')
@section('content')
    <div class="event-container">
        <div class="event-row">
            <div class="event-col-1">
                <h2 class="event-title">{{ $event->name_fa }}</h2>
                <p class="event-date">{{ $event->date }}</p>
                <p class="event-text">
                    {!! $event->description_fa !!}
                </p>
            </div>
            <div class="event-col-2">
                @foreach ($event->photos as $photo)

                    <img src="{{ $photo->image }}" data-src="{{ $photo->image }}" class="event-img">
                @endforeach

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.event-img').imageloader({
                callback: function (ele) {
                    $(ele).addClass('loaded');
                }
            });
        })
    </script>

@stop
