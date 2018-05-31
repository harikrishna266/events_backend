<div class="mb-3">
    {!! Form::label('name','Category Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
</div>

<div class="mb-3">
    {!! Form::label('description','description', ['class' => 'control-label']) !!}
    {!! Form::text('description', null, ['class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('street', '<span class="invalid-feedback">:message</span>') !!}
</div>

<div class="mb-3">
    {!! Form::label('image','image', ['class' => 'control-label']) !!}
    {!! Form::file('image', null, ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('image', '<span class="invalid-feedback">:message</span>') !!}
</div>

<div class="mb-3">
    {!! Form::label('map_icon','map_icon', ['class' => 'control-label']) !!}
    {!! Form::file('category_map_marker', null, ['class' => 'form-control' . ($errors->has('category_map_marker') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('category_map_marker', '<span class="invalid-feedback">:message</span>') !!}
</div>
