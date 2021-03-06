<div class="events-container">
    <h2 class="events-cat-h2">Events</h2>
    <div class="events-box-container">
        @foreach ($events as $event)
            <a href="events/{{ $event->id }}" class="events-box" data-page="project" data-title="Dokframe-project1">
                <div class="inner-rotate">
                    <div class="events-box-square">
                        <p class="event-title">{{ $event->date }}</p>
                        <div class="event-box-img-h">
                            <p class="event-title">{{ $event->name }}</p>
                            <img src="{{ $event->thumbnail->thumbnail_path }}"
                                 data-src="{{ $event->thumbnail->thumbnail_path }}"
                                 class="projects-img">
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
<script>
    $(document).ready(function () {
        events();
    })
</script>



