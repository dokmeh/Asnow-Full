@extends('admin.layout')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Cooperator #{{ $cooperator->id }}
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
                        <h2>{{ $cooperator->title }}</h2>
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

                        <div class="col-md-9 col-sm-9 col-xs-12">

                            <h3>Sort Photos:</h3>
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                <tr class="headings">

                                    <th class="column-title">Handle</th>
                                    <th>ID</th>
                                    <th class="column-title">Photo</th>
                                    <th class="column-title">Name</th>
                                </tr>
                                </thead>

                                <tbody class="sortable" data-entityname="photos">
                                @foreach ($cooperator->photos()->sorted()->get() as $photo)
                                    <tr class="even pointer" data-itemId="{{ $photo->id }}">
                                        <td class="sortable-handle"><span class="fa fa-bars fa-2x"
                                                                          aria-hidden="true"></span>
                                        </td>
                                        <td class="id-column">{{ $photo->id }}</td>
                                        <td class=" "><img class="avatar" src="{{ $photo->image }}"
                                                           alt=""></td>
                                        <td class=" ">{{ $photo->name }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div>

                        <!-- start cooperators-detail sidebar -->
                        <div class="col-md-3 col-sm-3 col-xs-12">

                            <section class="panel">

                                <div class="x_title">
                                    <h2>Cooperator Description:</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-body">
                                    <h3 class="green"><i class="fa fa-building"></i> {{ $cooperator->title }}</h3>

                                    <br/>

                                    <div class="project_detail">


                                        <p>

                                        <div class="">
                                            <label>
                                                <input name="visible" type="checkbox" disabled="disabled"
                                                       class="js-switch"
                                                       @if ($cooperator->visible == 1)
                                                       checked
                                                        @endif

                                                /> Visibility
                                            </label>
                                        </div>
                                        <small>To Change the visiblity please go to edit page.</small>
                                        </p>
                                    </div>

                                    <br/>
                                    <h5>Cooperator details:</h5>
                                    <ul class="list-unstyled project_files">
                                        <li><a href=""><i class="fa fa-file-word-o"></i>
                                                Website: {{ $cooperator->url }}
                                            </a>
                                        </li>


                                        <li><a href=""><i class="fa fa-file-word-o"></i>
                                                Category: {{ $cooperator->category->name }}
                                            </a>
                                        </li>

                                    </ul>
                                    <br/>


                                    <div class="text-center mtop20">

                                        <a href="/admin/cooperators/{{ $cooperator->id }}/edit"
                                           class="btn btn-sm btn-success">Edit</a>
                                        <a id="{{ $cooperator->id }}"
                                           data-href="/admin/cooperators/{{ $cooperator->id }}/deletebtn"
                                           class="btn btn-sm btn-danger">Delete</a>

                                        <script>
                                            $('a#{{ $cooperator->id  }}').on('click', function () {
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
                                                        href                 = $('#{{ $cooperator->id  }}').attr('data-href');
                                                        window.location.href = href;
                                                    });
                                            })
                                        </script>
                                    </div>
                                </div>

                            </section>

                        </div>
                        <!-- end cooperators-detail sidebar -->

                    </div>
                </div>
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
