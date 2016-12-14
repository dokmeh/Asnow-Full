@extends('layout')
@section('content')

    <div class="projects-container">
        <div class="projects-cat-container">
            <h2 class="projects-cat-h2">Projects</h2>
            <ul>
                <li data-prcat="all" class="projects-cat-li clicked">All</li>

                @foreach ($categories as $category)

                    <li data-prcat="{{$category->name}}" class="projects-cat-li">{{$category->name}}</li>

                @endforeach

            </ul>
        </div>
        <div class="projects-box-container">
            @foreach ($projects as $project)

                <a href="projects/{{ $project->id }}" class="projects-box" data-page="{{ $project->category->name }}"
                   data-title="{{ $project->title }}">
                    <div class="projects-box-square">
                        <img src="{{ $project->thumbnail_path }}"
                             data-src="{{ $project->thumbnail->thumbnail_path }}"
                             class="projects-img">
                        <div class="projects-title"><p>{{ $project->title }}<span>{{ $project->location }}
                                    - {{ $project->design_at }}</span></p>
                            <img src="img/projects/project-1/thumb/thumb-s.jpg"
                                 data-src="img/projects/project-1/thumb/thumb.jpg" class="projects-img-next">
                        </div>
                    </div>
                </a>
            @endforeach


        </div>
    </div>
@stop
