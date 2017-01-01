@extends('admin.layout')
@section('content')



    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Event #{{ $event->id }} Details</h3>
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
                        <h2>{{ $event->name }}</h2>
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

                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <div class="product-image">
                                <img src="images/prod-1.jpg" alt="..."/>
                            </div>
                            <div class="product_gallery">
                                <a>
                                    <img src="images/prod-2.jpg" alt="..."/>
                                </a>
                                <a>
                                    <img src="images/prod-3.jpg" alt="..."/>
                                </a>
                                <a>
                                    <img src="images/prod-4.jpg" alt="..."/>
                                </a>
                                <a>
                                    <img src="images/prod-5.jpg" alt="..."/>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

                            <h3 class="prod_title">{{ $event->name }}</h3>

                            <p>{!! $event->description !!}</p>
                            <br/>

                            <div class="">
                                <h2>Actions:</h2>
                                <ul class="list-inline prod_color">
                                    <li>
                                        <a href="/admin/events/{{ $event->id }}/edit" class="btn btn-sm btn-success">Edit</a>
                                    </li>
                                    <li>
                                        <a id="{{ $event->id }}" href="/admin/events/{{ $event->id }}/deletebtn"
                                           class="btn btn-sm btn-danger">Delete</a>

                                        <script>
                                            $('a#{{ $event->id  }}').on('click', function () {
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
                                                        href                 = $('#{{ $event->id  }}').attr('data-href');
                                                        window.location.href = href;
                                                    });
                                            })
                                        </script>
                                    </li>

                                    <li>

                                        <label>
                                            <input name="visible" type="checkbox" disabled="disabled"
                                                   class="js-switch"
                                                   checked/> Visibility

                                            <small>To Change the visiblity please go to edit page.</small>

                                        </label>

                                    </li>

                                </ul>
                            </div>
                            <br/>

                            <div class="">
                                <h2>Date:
                                    <small>{{ $event->date }}</small>
                                </h2>

                            </div>
                            <br/>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@stop
