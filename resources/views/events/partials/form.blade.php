<div class="mb-3">
    {!! Form::label('category','category', ['class' => 'control-label']) !!}
    {!! Form::select('category_id', $categories, (!empty($category) ? $category->id : null), ['class' => 'form-control' . ($errors->has('category') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('category', '<span class="invalid-feedback">:message</span>') !!}
</div>


<div class="mb-3">
    {!! Form::label('name','name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
</div>

<div class="mb-3">
    {!! Form::label('place','place', ['class' => 'control-label']) !!}
    {!! Form::text('place', null, ['class' => 'form-control' . ($errors->has('place') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('place', '<span class="invalid-feedback">:message</span>') !!}
</div>

<div class="mb-3">
    {!! Form::label('latitude','latitude', ['class' => 'control-label']) !!}
    {!! Form::text('latitude', null, ['class' => 'form-control' . ($errors->has('latitude') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('latitude', '<span class="invalid-feedback">:message</span>') !!}
</div>

<div class="mb-3">
    {!! Form::label('logitude','logitude', ['class' => 'control-label']) !!}
    {!! Form::text('logitude', null, ['class' => 'form-control' . ($errors->has('logitude') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('logitude', '<span class="invalid-feedback">:message</span>') !!}
</div>

<div class="mb-3">
    {!! Form::label('start_date','start_date', ['class' => 'control-label']) !!}
    {!! Form::text('start_date', null, ['class' => 'form-control' . ($errors->has('start_date') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('start_date', '<span class="invalid-feedback">:message</span>') !!}
</div>


<div class="mb-3">
    {!! Form::label('end_date','end_date', ['class' => 'control-label']) !!}
    {!! Form::text('end_date', null, ['class' => 'form-control' . ($errors->has('end_date') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('end_date', '<span class="invalid-feedback">:message</span>') !!}
</div>


<div class="mb-3">
    {!! Form::label('start_time','start_time', ['class' => 'control-label']) !!}
    {!! Form::text('start_time', null, ['class' => 'form-control' . ($errors->has('start_time') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('start_time', '<span class="invalid-feedback">:message</span>') !!}
</div>


<div class="mb-3">
    {!! Form::label('end_time','end_time', ['class' => 'control-label']) !!}
    {!! Form::text('end_time', null, ['class' => 'form-control' . ($errors->has('end_time') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('end_time', '<span class="invalid-feedback">:message</span>') !!}
</div>


<div class="mb-3">
    {!! Form::label('image','image', ['class' => 'control-label']) !!}
    {!! Form::file('image', null, ['class' => 'form-control' . ($errors->has('image') ? ' is-invalid' : '') ]) !!}
    {!! $errors->first('image', '<span class="invalid-feedback">:message</span>') !!}
</div>