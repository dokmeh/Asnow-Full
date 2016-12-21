<div class="events-container">
    <h2 class="events-cat-h2">Publications</h2>
    <div class="events-box-container">
        @foreach ($publications as $publication)

            <a href="publications/{{$publication->id}}" class="events-box pub-box" data-page="project"
               data-title="Dokframe-project1">
                <div class="inner-rotate">
                    <div class="events-box-square">

                        <div class="event-box-img-h">
                            <p class="event-title">{{ $publication->name }}</p>
                            <img src="img/events/event1/cover.jpg" data-src="img/events/event1/cover.jpg"
                                 class="projects-img">
                        </div>
                        <p class="event-title">{{ $publication->project->title }}</p>
                    </div>
                </div>
            </a>
        @endforeach

    </div>
</div>


