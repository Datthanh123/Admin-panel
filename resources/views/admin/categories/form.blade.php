<div class="form-group {{ $errors->has('cate_name') ? 'has-error' : ''}}">
    {!! Form::label('cate_name', 'Cate Name', ['class' => 'control-label']) !!}
    {!! Form::text('cate_name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('cate_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('cate_slug') ? 'has-error' : ''}}">
    {!! Form::label('cate_slug', 'Cate Slug', ['class' => 'control-label']) !!}
    {!! Form::text('cate_slug', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('cate_slug', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
