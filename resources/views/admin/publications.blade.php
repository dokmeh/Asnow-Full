@extends('admin.layout')
@section('content')

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Publications
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
                                            href="/admin/project/{{ $project->id }}/publications/create"
                                            class="btn btn-sm btn-warning">Add Publication</a>
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

                                <p>{{ $project->title }}'s Publications</p>
                            @if (count($project->publications) > 0)
                                <!-- start project list -->
                                    <table class="table table-striped projects">
                                        <thead>
                                        <tr>
                                            <th style="width: 1%">Handle</th>
                                            <th style="width: 1%">ID</th>
                                            <th style="width: 20%">Publication Name</th>
                                            <th style="width: 20%">Visbility</th>
                                            <th style="width: 20%">#Edit</th>
                                        </tr>
                                        </thead>
                                        <tbody class="sortable" data-entityname="publications">

                                        @foreach ($project->publications as $publication)

                                            <tr data-itemId="{{ $project->id }}">
                                                <td class="sortable-handle"><span class="fa fa-bars fa-2x"
                                                                                  aria-hidden="true"></span>
                                                </td>
                                                <td class="id-column">{{ $publication->id }}</td>
                                                <td>
                                                    <a>{{ $publication->name}}</a>
                                                    <br/>
                                                    <small>{{ $publication->created_at }}</small>
                                                </td>

                                                <td class="project_progress">
                                                    @if ($publication->visible == 1)
                                                        <span type="button"
                                                              class="btn btn-success btn-xs">Showing</span>
                                                    @endif
                                                    @if ($publication->visible == 0)
                                                        <span type="button"
                                                              class="btn btn-default btn-xs">Hide</span>
                                                    @endif
                                                </td>


                                                <td>
                                                    <a href="/admin/project/{{ $publication->id }}"
                                                       class="btn btn-primary btn-xs"><i
                                                                class="fa fa-folder"></i> View
                                                    </a>
                                                    <a href="/admin/publications/{{ $publication->id }}/edit"
                                                       class="btn btn-info btn-xs"><i
                                                                class="fa fa-pencil"></i> Edit </a>
                                                    <a href="/admin/publications/{{ $publication->id }}/deletebtn"
                                                       class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>
                                                        Delete
                                                    </a>


                                                </td>
                                            </tr>

                                        @endforeach

                                        </tbody>
                                    </table>
                                @else
                                    <h3>There is no Publication(s)</h3>
                                    <!-- end project list -->
                                @endif


                            </div>


                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var App = {};

        App.notify         = {
            message: function (message, type) {
                if ($.isArray(message)) {
                    $.each(message, function (i, item) {
                        App.notify.message(item, type);
                    });
                } else {
                    $.bootstrapGrowl(message, {
                        type     : type,
                        delay    : 4000,
                        placement: {
                            from : "top",
                            align: "right"
                        },
                        align    : 'right',
                    });
                }
            },

            danger         : function (message) {
                App.notify.message(message, 'danger');
            },
            success        : function (message) {
                App.notify.message(message, 'success');
            },
            info           : function (message) {
                App.notify.message(message, 'info');
            },
            warning        : function (message) {
                App.notify.message(message, 'warning');
            },
            validationError: function (errors) {
                $.each(errors, function (i, fieldErrors) {
                    App.notify.danger(fieldErrors);
                });
            }
        };
        var changePosition = function (requestData) {
            $.ajax({
                'url'    : '/sort',
                'type'   : 'POST',
                'data'   : requestData,
                'success': function (data) {
                    if (data.success) {
                        console.log('Saved!');
                        App.notify.success('Saved!');
                    } else {
                        console.error(data.errors);
                        App.notify.validationError(data.errors);
                    }
                },
                'error'  : function () {
                    console.error('Something wrong!');
                    App.notify.danger('Something wrong!');
                }
            });
        };

        $(document).ready(function () {
            var $sortableTable = $('.sortable');
            if ($sortableTable.length > 0) {
                $sortableTable.sortable({
                    handle: '.sortable-handle',
                    axis  : 'y',
                    update: function (a, b) {

                        var entityName = $(this).data('entityname');
                        var $sorted    = b.item;

                        var $previous = $sorted.prev();
                        var $next     = $sorted.next();

                        if ($previous.length > 0) {
                            changePosition({
                                parentId        : $sorted.data('parentid'),
                                type            : 'moveAfter',
                                entityName      : entityName,
                                id              : $sorted.data('itemid'),
                                positionEntityId: $previous.data('itemid')
                            });
                        } else if ($next.length > 0) {
                            changePosition({
                                parentId        : $sorted.data('parentid'),
                                type            : 'moveBefore',
                                entityName      : entityName,
                                id              : $sorted.data('itemid'),
                                positionEntityId: $next.data('itemid')
                            });
                        } else {
                            console.error('Something wrong!');
                            App.notify.danger('Something wrong!');
                        }
                    },
                    cursor: "move"
                });
            }
            $('.sortable td').each(function () {
                $(this).css('width', $(this).width() + 'px');
            });
        });

    </script>
@stop
