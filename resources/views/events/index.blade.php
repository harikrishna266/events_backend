@extends('app')

@section('main')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
        <h1 class="h2">Events</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ route('events.create') }}" class="btn btn-primary"><span data-feather="plus"></span> Create</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-vcenter table-hover table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Event name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Start </th>
                <th>End </th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->description }}</td>
                    <td><img   width="30px" src="./images/{{ $event->image }}" ></td>
                    <td>{{ $event->start_date }} {{$event->start_time}}</td>
                    <td>{{ $event->end_date }} {{$event->end_time}}</td>
                    <td class="text-center">
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning"><span data-feather="edit-2"></span></a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['events.destroy', $event->id],'onsubmit' => 'return confirm("Are you sure?")', 'id'=>$event->id]) !!}
                            <a href="#" onclick="$(this).closest('form').submit();">Delete</a>
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop