@extends('admin.layout')
@section('content')




    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    Awards
                </div>
                <div class="card-body no-padding">


                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Sort</th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Icon</th>
                            <th>Project Name</th>
                            <th>Action</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody class="sortable" data-entityname="awards">
                        @foreach ($awards as $award)
                            <tr data-itemId="{{ $award->id }}">
                                <td class="sortable-handle"><span class="glyphicon glyphicon-sort"></span></td>
                                <td class="id-column">{{ $award->id }}</td>
                                <td>{{ $award->name }}</td>
                                <td><img height="50px" width="50px" src="{{ $award->photo->image }}" alt=""></td>

                                <td><a href="/admin/project/{{ $award->project->id }}">{{ $award->project->title }}</a>
                                </td>

                                <td><a href="/admin/awards/{{ $award->id }}/edit"
                                       class="btn btn-primary btn-xs">Edit</a></td>
                                <td>

                                    <a href="/admin/awards/{{ $award->id }}/deletebtn" class="btn btn-danger btn-xs">Delete</a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
                        type  : type,
                        delay : 4000,
                        offset: {from: 'bottom', amount: 5}, // 'top', or 'bottom'
                        align : 'right'
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
