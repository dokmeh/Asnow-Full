@extends('admin.layout')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                    Add a new Event
                </div>
                <div class="card-body">
                    <div class="row">
                        <form action="/admin/events/create" method="POST">
                            {{ csrf_field() }}
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Event's Name...">
                                <input type="text" name="name_fa" class="form-control" placeholder="نام رویداد">

                                <textarea name="description" rows="3" class="form-control"
                                          placeholder="Description..."></textarea>
                                <p>توضیحات:</p>
                                <textarea name="description_fa" rows="3" class="form-control"
                                          placeholder="Description..."></textarea>
                                <Br>
                                <input name="date" type="date" step="1"
                                       placeholder="Date"/>

                                <br><br>
                                <button type="submit" class="btn btn-primary">Next</button>
                                <a href="/admin/events/create" class="btn btn-default">Cancel</a>

                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
