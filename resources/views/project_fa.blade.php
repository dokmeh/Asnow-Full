@extends('layout_fa')
@section('content')
    <div class="project-container">
        <div class="project-info-container">
            <div class="texts-masks backface">
                <h2 class="project-title">{{ $project->title_fa }}</h2>
                <p>کارفرما:{{ $project->client_fa }}</p>
                <p>موقعیت:{{ $project->location_fa }}</p>
                <p>ساخته شده در::{{ $project->completed_at }}</p>
                <p>نوع:{{ $project->category->name_fa }}</p>
                {{--<p>وضعیت:{{ $project->status->name }}</p>--}}
                @if (count($project->awards) > 0)
                    <h3>جایزه ها</h3>

                    @foreach ($project->awards as $award)
                        <p>{{ $award->name_fa }}</p>
                        <img src="{{ $award->photo->image }}" width="100" alt="">
                    @endforeach
                @endif

                <p class="project-story-title">نوضیح:</p>
                <div class="project-story">
                    {!! $project->description_fa !!}
                </div>
            </div>
            <div class="texts-masks backface back-side">
                @foreach ($project->photos as $photo)

                    <div class="project-img-box-t">
                        <img src="{{ $photo->image }}" class="project-img-t"
                             data-src="{{ $photo->image }}">
                    </div>
                @endforeach

            </div>
        </div>
        <div class="switch-bt">
            <div class="open-t-bt">
                <img src="img/all-t.svg" alt=""/>
            </div>
            <div class="open-t-bt close-bt">
                <img src="img/c-t.svg" alt=""/>
            </div>
        </div>
        <div class="poject-img-container">
            {{--<div class="project-img-box">--}}
            {{--<img src="{{ $project->photos->last()->image }}" class="project-img show"--}}
            {{--onload="$(this).addClass('Loaded')">--}}
            {{--</div>--}}
            @foreach ($project->photos as $photo)

                <div class="project-img-box">
                    <img src="{{ $photo->image }}" class="project-img" onload="$(this).addClass('Loaded')">
                </div>
            @endforeach

            <div class="controlers">
                <div class="project-arrow prev">
                    <img src="img/left.svg" alt=""/>
                </div>
                <div class="project-arrow next">
                    <img src="img/right.svg" alt=""/>
                </div>
                <div class="project-arrow-f">
                    <div class="arrow fullscreen">
                        <img src="img/fullscreen.svg" alt=""/>
                        <img src="img/close.svg" alt=""/>
                    </div>
                    <div class="arrow slideshow">
                        <img src="img/pause.svg" alt=""/>
                        <img src="img/play-button.svg" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
