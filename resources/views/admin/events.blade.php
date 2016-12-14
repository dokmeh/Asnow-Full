@extends('admin.layout')
@section('content')




    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    Events
                </div>
                <div class="card-body no-padding">
                    <table class="datatable table table-striped primary" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Action</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($events as $event)


                            <tr>

                                <td><a href="/admin/events/{{ $event->id }}">{{ $event->name }}</a></td>

                                <td>{{ $event->date }}</td>

                                <td><a href="/admin/events/{{ $event->id }}/edit"
                                       class="btn btn-primary btn-xs">Edit</a></td>
                                <td>
                                    <form action="/admin/events/{{ $event->id }}/delete" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger btn-xs">Delete</button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>








@stop
