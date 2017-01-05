@extends('admin.layout')
@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Awards
                </h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                @if (count($projects) > 0 )

                    @foreach ($projects as $project)

                        <div class="x_panel">


                            <div class="x_title">
                                <h2>{{ $project->title }} <a
                                            href="/admin/project/{{ $project->id }}/awards/create"
                                            class="btn btn-sm btn-warning">Add Award</a>
                                </h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Settings 1</a>
                                            </li>
                                            <li><a href="#">Settings 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>


                            <div class="x_content">

                                <p>{{ $project->title }}'s Awards</p>
                            @if (count($project->awards) > 0)
                                <!-- start project list -->
                                    <table class="table table-striped projects">
                                        <thead>
                                        <tr>
                                            <th style="width: 1%">Handle</th>
                                            <th style="width: 1%">ID</th>
                                            <th style="width: 20%">Award Name</th>
                                            <th style="width: 20%">#Edit</th>
                                        </tr>
                                        </thead>
                                        <tbody class="sortable" data-entityname="awards">

                                        @foreach ($project->awards()->sorted()->get() as $award)

                                            <tr data-itemId="{{ $project->id }}">
                                                <td class="sortable-handle"><span class="fa fa-bars fa-2x"
                                                                                  aria-hidden="true"></span>
                                                </td>
                                                <td class="id-column">{{ $award->id }}</td>
                                                <td>
                                                    <a>{{ $award->name}}</a>
                                                    <br/>
                                                    <small>{{ $award->created_at }}</small>
                                                </td>


                                                <td>
                                                    <a href="/admin/project/{{ $award->id }}"
                                                       class="btn btn-primary btn-xs"><i
                                                                class="fa fa-folder"></i> View
                                                    </a>
                                                    <a href="/admin/awards/{{ $award->id }}/edit"
                                                       class="btn btn-info btn-xs"><i
                                                                class="fa fa-pencil"></i> Edit </a>
                                                    <a id="{{ $award->id }}"
                                                       data-href="/admin/awards/{{ $award->id }}/deletebtn"
                                                       class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>
                                                        Delete
                                                    </a>


                                                </td>
                                            </tr>
                                            <script>
                                                $('a#{{ $award->id }}').on('click', function () {
                                                    swal({
                                                            title             : "Are you sure?",
                                                            text              : "You will not be able to recover this!",
                                                            type              : "warning",
                                                            showCancelButton  : true,
                                                            confirmButtonColor: "#DD6B55",
                                                            confirmButtonText : "Yes, delete it!",
                                                            closeOnConfirm    : false
                                                        },
                                                        function () {
                                                            href                 = $('#{{ $award->id }}').attr('data-href');
                                                            window.location.href = href;
                                                        });
                                                })
                                            </script>
                                        @endforeach

                                        </tbody>
                                    </table>
                                @else
                                    <h3>There is no Award(s)</h3>
                                    <!-- end project list -->
                                @endif


                            </div>


                        </div>
                    @endforeach
                @else <h3 class="text-center">There is no project.</h3>
                @endif

            </div>
        </div>
    </div>
    @include('partials.scripts')

@stop
