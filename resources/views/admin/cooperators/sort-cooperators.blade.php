@extends('admin.layout')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Sort The Cooperators

                </h3>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Sorting The Cooperators / Drag and Drop

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
                        @if(count($cooperators) > 0)
                            <div class="x_content">


                                <div class="table-responsive">
                                    <table class="table table-striped jambo_table bulk_action">
                                        <thead>
                                        <tr class="headings">

                                            <th class="column-title">Handle</th>
                                            <th>ID</th>
                                            <th class="column-title">Cooperator Name</th>
                                            <th class="column-title">Category</th>
                                            <th class="column-title no-link last"><span class="nobr">Action</span>
                                            </th>
                                        </tr>
                                        </thead>

                                        <tbody class="sortable" data-entityname="cooperators">
                                        @foreach ($cooperators as $cooperator)
                                            <tr class="even pointer" data-itemId="{{ $cooperator->id }}">
                                                <td class="sortable-handle"><span class="fa fa-sort fa-2x"
                                                                                  aria-hidden="true"></span>
                                                </td>
                                                <td class="id-column">{{ $cooperator->id }}</td>
                                                <td class=" ">{{ $cooperator->title }}</td>
                                                <td class=" ">{{ $cooperator->category->name }}</td>
                                                <td class=" last"><a
                                                            href="/admin/cooperators/{{ $cooperator->id }}">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @else <h4 class="text-center">There is no cooperator.</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.scripts')


@stop
