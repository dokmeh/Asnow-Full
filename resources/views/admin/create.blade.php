@extends('admin.layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    Add a new Project
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="/admin/project/create" method="POST">
                            {{ csrf_field() }}
                            {{--<input type="hidden" name="sort" value="{{ $sort }}">--}}
                            <div class="col-md-6">
                                <input type="text" name="title" class="form-control" placeholder="Title...">
                                <input type="text" name="client" class="form-control" placeholder="Client...">
                                <input type="text" name="location" class="form-control" placeholder="Location...">
                                <input type="number" name="site_area" class="form-control"
                                       placeholder="Site Area Meter...">
                                <input type="number" name="floor_area" class="form-control"
                                       placeholder="Floor Area Meter...">


                                <select name="category_id" class="select2">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach

                                </select>

                                <select name="status_id" class="select2">
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">


                                <textarea name="description" rows="3" class="form-control"
                                          placeholder="Description..."></textarea>
                                <Br>
                                <input name="design_at" type="number" min="1900" max="2099" step="1"
                                       placeholder="Designed At"/>
                                <input name="completed_at" type="number" min="1900" max="2099" step="1"
                                       placeholder="Completed At"/>
                                <br><br>
                                <button type="submit" class="btn btn-primary">Next</button>
                                <a href="/admin/project/create" class="btn btn-default">Cancel</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
