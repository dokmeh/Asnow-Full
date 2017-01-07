

    <div class="projects-container">
        <div class="projects-cat-container">
            <h2 class="projects-cat-h2">پروژه ها</h2>

            <ul>
                <li data-prcat="all" class="projects-cat-li clicked">همه</li>

                @foreach ($categories as $category)

                    <li data-prcat="{{$category->name}}" class="projects-cat-li">{{ $category->name_fa }}</li>

                @endforeach

            </ul>
        </div>
        <div class="projects-box-container">
            @foreach ($projects as $project)

                <a href="/fa/projects/{{ $project->id }}" class="projects-box"
                   data-page="{{ $project->category->name }}"
                   data-title="{{ $project->title_fa }}">
                    <div class="projects-box-square">
                        <img src="{{ $project->thumbnails->first()->thumbnail_path }}"
                             data-src="{{ $project->thumbnails->first()->thumbnail_path }}"
                             class="projects-img">
                        <div class="projects-title"><p>{{ $project->title_fa }}<span>{{ $project->location_fa }}
                                    - {{ $project->design_at }}</span></p>
                            <img src="{{ $project->thumbnails->last()->thumbnail_path }}"
                                 data-src="{{ $project->thumbnails->last()->thumbnail_path }}"
                                 class="projects-img-next">
                        </div>
                    </div>
                </a>
            @endforeach


        </div>
    </div>

<script>
    $(document).ready(function() {
        projects();
    });
</script>
