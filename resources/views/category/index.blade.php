@extends('app')

@section('main')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
        <h1 class="h2">Categories</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ route('categories.create') }}" class="btn btn-primary"><span data-feather="plus"></span> Create</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-vcenter table-hover table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Category name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Icon</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $cat)
                <tr>
                    <td>{{ $cat->id }}</td>
                    <td>{{ $cat->name }}</td>
                    <td>{{ $cat->description }}</td>
                    <td><img   width="30px" src="./images/{{ $cat->image }}" ></td>
                    <td><img   width="30px" src="./images/{{ $cat->category_map_marker }}" ></td>
                    <td class="text-center">
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-warning"><span data-feather="edit-2"></span></a>
                            <!-- <a data-method="DELETE" data-confirm="Are you sure?" href="{{ route('categories.destroy', $cat->id) }}" class="btn btn-danger"><span data-feather="x"></span></a> -->
                            {!! Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $cat->id],'onsubmit' => 'return confirm("Are you sure?")', 'id'=>$cat->id]) !!}
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