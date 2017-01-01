@extends('admin.layout')
@section('content')


    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Request #{{ $request->id }}</h3>
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
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{ $request->name }} <a id="{{ $request->id }}"
                                                    data-href="/admin/requests/{{ $request->id }}/deletebtn"
                                                    class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete
                            </a>

                            <script>
                                $('a#{{ $request->id }}').on('click', function () {
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
                                            href                 = $('#{{ $request->id }}').attr('data-href');
                                            window.location.href = href;
                                        });
                                })
                            </script>
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
                        <h3>Request Type:

                            @if ($request->request_type == 'visit_request')
                            Visit Request
                            @endif

                            @if ($request->request_type == 'order_request')
                            Order Request
                            @endif

                            @if ($request->request_type == 'council_request')
                            Council Request
                            @endif

                            @if ($request->request_type == 'follow_request')
                            Follow Request
                            @endif

                            @if ($request->request_type == 'other')
                            Other<br>

                            @endif

                        </h3>

                        <h3><span class="fa fa-user" aria-hidden="true"></span> {{ $request->name }}</h3>
                        <h3><span class="fa fa-phone-square" aria-hidden="true"></span> {{ $request->phone }}</h3>


                        @if ($request->request_type == 'other')
                            <h3>Description: {{ $request->other_request }}</h3>

                        @endif
                        @foreach ($request->files as $photo)

                            <a href="{{ $photo->path }}">Download file</a>


                        @endforeach




                        @foreach ($request->photos as $photo)

                            <div class="col-md-55">
                                <div class="thumbnail">
                                    <div class="image view view-first">
                                        <img style="width: 100%; display: block;" src="{{ $photo->image }}"
                                             alt="image"/>

                                    </div>
                                    <div class="caption">
                                        <p>{{ $photo->created_at }}</p>
                                    </div>
                                </div>
                            </div>


                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@stop
