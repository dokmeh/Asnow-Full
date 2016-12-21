<div class="events-container">
    <h2 class="events-cat-h2">مجلات</h2>
    <div class="events-box-container">
        @foreach ($publications as $publication)

            <a href="/fa/publications/{{$publication->id}}" class="events-box pub-box" data-page="project"
               data-title="Dokframe-project1">
                <div class="inner-rotate">
                    <div class="events-box-square">

                        <div class="event-box-img-h">
                            <p class="event-title">{{ $publication->name_fa }}</p>
                            <img src="img/events/event1/cover.jpg" data-src="img/events/event1/cover.jpg"
                                 class="projects-img">
                        </div>
                        <p class="event-title">{{ $publication->project->title_fa }}</p>
                    </div>
                </div>
            </a>
        @endforeach

    </div>
</div>


