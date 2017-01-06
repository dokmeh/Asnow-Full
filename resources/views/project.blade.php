<div class="back-but">
    <div class="inner-back-bt">
        <span class="mile"></span><span class="mile"></span><span class="mile"></span>
    </div>
</div>
<div class="project-container">
    <div class="project-info-container">
        <div class="texts-masks backface">
            <h2 class="project-title">{{ $project->title }}</h2>
            <p>
                <small>Client:</small>{{ $project->client->name }}</p>
            <p>
                <small>Location:</small>{{ $project->location }}</p>
            <p>
                <small>Date:</small>{{ $project->completed_at }}</p>
            <p>
                <small>Type:</small>{{ $project->category->name }}</p>
            <p>
                <small>Status:</small>{{ $project->status->name }}</p>
            @if (count($project->awards) > 0)
                <h3>Awards:</h3>

                @foreach ($project->awards()->sorted()->get() as $award)
                    <p>{{ $award->name }}</p>
                    <img src="{{ $award->photo->image }}" width="100" alt="">
                @endforeach
            @endif

            <p class="project-story-title">Story</p>
            <div class="project-story">
                {!! $project->description !!}
            </div>
        </div>
        <div class="texts-masks backface back-side">
            {{--@foreach ($project->photos()->sorted()->get() as $photo)--}}

            <div class="project-img-box-t">
                <img src="\img\project\photos\thumbnails\1483545333thumb.jpg" class="project-img-t"
                     data-src="\img\project\photos\thumbnails\1483545333thumb.jpg">
            </div>

            <div class="project-img-box-t">
                <img src="\img\project\photos\thumbnails\1483545333thumb.jpg" class="project-img-t"
                     data-src="\img\project\photos\thumbnails\1483545333thumb.jpg">
            </div>
            {{--@endforeach--}}

        </div>
    </div>
    <div class="switch-bt">
        <div class="open-t-bt">
            <img src="/img/all-t.svg" alt=""/>
        </div>
        <div class="open-t-bt close-bt">
            <img src="/img/c-t.svg" alt=""/>
        </div>
    </div>
    <div class="poject-img-container">

        {{--        @foreach ($project->photos()->sorted()->get() as $photo)--}}

        <div class="project-img-box">
            <img src="\img\project\photos\thumbnails\1483545333thumb.jpg" class="project-img">
        </div>

        <div class="project-img-box">
            <img src="\img\project\photos\thumbnails\1483545333thumb.jpg" class="project-img">
        </div>
        {{--@endforeach--}}

        <div class="controlers">
            <div class="project-arrow prev">
                <img src="/img/left.svg" alt=""/>
            </div>
            <div class="project-arrow next">
                <img src="/img/right.svg" alt=""/>
            </div>
            <div class="project-arrow-f">
                <div class="arrow fullscreen">
                    <img src="/img/fullscreen.svg" alt=""/>
                </div>
                <div class="arrow slideshow">
                    <img src="/img/pause.svg" alt=""/>
                    <img src="/img/play-button.svg" alt=""/>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        project();
    });
</script>
