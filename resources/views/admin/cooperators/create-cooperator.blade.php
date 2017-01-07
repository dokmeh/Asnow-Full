@extends('admin.layout')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Create Cooperator</h3>
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
                    @if (count($categories) > 0)

                        <div class="x_title">
                            <h2>Create Form
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
                            <br/>
                            <form id="demo-form2" action="/admin/cooperators/create" method="POST" data-parsley-validate
                                  class="form-horizontal form-label-left">
                                {{ csrf_field() }}
                                <input type="hidden" name="visible" value="0">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Cooperator's
                                                                                                         Name:
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="title" name="title" required="required"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="url" class="control-label col-md-3 col-sm-3 col-xs-12">
                                        Cooperator Site:</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="url" class="form-control  col-md-7 col-xs-12" type="url"
                                               placeholder="http://www.example.com" name="url">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Category:
                                        <span
                                                class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="category" name="category_id" class="form-control">
                                            @foreach ($categories as $category)

                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">نام همکار:
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="title" name="title_fa" required="required"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>


                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <a href="/admin/project/create" class="btn btn-primary">Cancel</a>
                                        <button type="submit" id="submit" value="submit" class="btn btn-success">Next
                                        </button>
                                    </div>
                                </div>

                            </form>

                        </div>

                    @else <h3 class="text-danger">First You Must Create Categories</h3>
                    @endif
                </div>


            </div>
        </div>
    </div>



@stop
