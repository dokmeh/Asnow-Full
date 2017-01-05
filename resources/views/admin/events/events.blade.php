@extends('admin.layout')
@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Events
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
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Events</h2>
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
                    @if (count($events) > 0 )

                        <div class="x_content">

                            <p>Simple table with event listing with progress and editing options</p>

                            <!-- start event list -->
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th style="width: 20%">Event Name</th>
                                    <th>Thumbnail</th>
                                    <th>Datetime</th>
                                    <th>Visibility</th>
                                    <th style="width: 20%">#Edit</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($events as $event)

                                    <tr>
                                        <td>#</td>
                                        <td>
                                            <a>{{ $event->name }}</a>
                                            <br/>
                                            <small>{{ $event->created_at }}</small>
                                        </td>
                                        <td>
                                            <ul class="list-inline">


                                                <li>
                                                    <img src="{{ $event->thumbnail->thumbnail_path }}" class="avatar"
                                                         alt="Thumbnail">
                                                </li>


                                            </ul>
                                        </td>
                                        <td>
                                            {{ $event->date }}
                                        </td>
                                        <td class="project_progress">
                                            @if ($event->visible == 1)
                                                <span type="button"
                                                      class="btn btn-success btn-xs">Showing</span>
                                            @endif
                                            @if ($event->visible == 0)
                                                <span type="button"
                                                      class="btn btn-default btn-xs">Hide</span>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="/admin/events/{{ $event->id }}"
                                               class="btn btn-primary btn-xs"><i
                                                        class="fa fa-folder"></i> View
                                            </a>
                                            <a href="/admin/events/{{ $event->id }}/edit"
                                               class="btn btn-info btn-xs"><i
                                                        class="fa fa-pencil"></i> Edit </a>
                                            <a id="{{ $event->id }}"
                                               data-href="/admin/events/{{ $event->id }}/deletebtn"
                                               class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete
                                            </a>


                                        </td>
                                    </tr>
                                    <script>
                                        $('a#{{ $event->id }}').on('click', function () {
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
                                                    href                 = $('#{{ $event->id }}').attr('data-href');
                                                    window.location.href = href;
                                                });
                                        })
                                    </script>

                                @endforeach


                                </tbody>
                            </table>
                            <!-- end event list -->
                            @else
                                <h2 class="text-center">There is no event.</h2>

                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>


@stop
