@extends('admin.layout')
@section('content')




    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    Projects
                </div>
                <div class="card-body no-padding">
                    <table class="datatable table table-striped primary" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Client</th>
                            <th>Status</th>
                            <th>Category</th>
                            <th>Design At</th>
                            <th>Completed At</th>
                            <th>Action</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($projects as $project)


                            <tr>

                                <td><a href="/admin/project/{{ $project->id }}">{{ $project->title }}</a></td>

                                <td>{{ $project->client }}</td>
                                <td>{{ $project->status->name }}</td>
                                <td>{{ $project->category->name }}</td>
                                <td>{{ $project->design_at }}</td>
                                <td>{{ $project->completed_at }}</td>
                                <td><a href="/admin/project/{{ $project->id }}/edit"
                                       class="btn btn-primary btn-xs">Edit</a></td>
                                <td>
                                    <form action="/admin/project/{{ $project->id }}/delete" method="POST">
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
