<div class="projects-container">
    <div class="projects-cat-container">
        <h2 class="projects-cat-h2">Projects</h2>
        <ul>
            <li data-prcat="all" class="projects-cat-li clicked" data-en="All" data-fa="همه">All</li>

            @foreach ($categories as $category)

                <li data-prcat="{{$category->name}}" class="projects-cat-li">{{ $category->name }}</li>

            @endforeach

        </ul>
    </div>
    <div class="projects-box-container">


        <a href="/projects/request" class="projects-box">
            <div class="projects-box-square youre-project-box">
                <img src="/img/projects/project-1/thumb/thumb-s.jpg"
                     data-src="/img/projects/project-1/thumb/thumb-s.jpg"
                     class="projects-img">
                <div class="projects-title"><p>Youre Project Goes Here...<span>Youre Location
                            - Date Time</span></p>
                    <img src="/img/projects/project-1/thumb/thumb-s.jpg"
                         data-src="/img/projects/project-1/thumb/thumb-s.jpg"
                         class="projects-img-next">
                </div>
            </div>
        </a>

        @if (count($projects) > 0)

            @foreach ($projects as $project)

                <a href="projects/{{ $project->id }}" class="projects-box" data-page="{{ $project->category->name }}"
                   data-title="{{ $project->title }}">
                    <div class="projects-box-square">
                        <img src="\img\project\photos\thumbnails\1483545333thumb.jpg"
                             data-src="\img\project\photos\thumbnails\1483545333thumb.jpg"
                             class="projects-img">
                        <div class="projects-title"><p>{{ $project->title }}<span>{{ $project->location }}
                                    - {{ $project->design_at }}</span></p>
                            <img src="\img\project\photos\thumbnails\1483545333thumb.jpg"
                                 data-src="\img\project\photos\thumbnails\1483545333thumb.jpg"
                                 class="projects-img-next">
                        </div>
                    </div>
                </a>
            @endforeach
        @endif


    </div>
</div>
<script>
    $(document).ready(function () {
        projects();
    });
</script>
