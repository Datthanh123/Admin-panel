<div class="form-group{{ $errors->has('cate_id') ? 'has-error' : ''}}">
    {!! Form::label('cate_id', 'Cate Name', ['class' => 'control-label']) !!}
    {!! Form::select('cate_id', $cates, null, ['placeholder' => '--Select---','class' => 'col-md-4 form-control', 'required' => 'required'] ) !!}
    {!! $errors->first('cate_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('post_title') ? 'has-error' : ''}}">
    {!! Form::label('post_title', 'Post Title', ['class' => 'control-label']) !!}
    {!! Form::text('post_title', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('post_title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('post_tease') ? 'has-error' : ''}}">
    {!! Form::label('post_tease', 'Post Tease', ['class' => 'control-label']) !!}
    {!! Form::textarea('post_tease', null, ['class' => 'form-control description']) !!}
    {!! $errors->first('post_tease', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('post_content') ? 'has-error' : ''}}">
    {!! Form::label('post_content', 'Post Content', ['class' => 'control-label']) !!}
    {!! Form::textarea('post_content', null, ['id' => 'editor1'], ['class' => 'form-control', 'required' => 'required'] ) !!}
    {!! $errors->first('post_content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('post_author') ? 'has-error' : ''}}">
    {!! Form::label('post_author', 'Post Author', ['class' => 'control-label']) !!}
    {!! Form::text('post_author', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('post_author', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('post_image') ? 'has-error' : ''}}">
    {!! Form::label('post_image', 'Post Image', ['class' => 'control-label']) !!}
    {!! Form::file('post_image', old('image'), ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('post_image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('post_image_dec') ? 'has-error' : ''}}">
    {!! Form::label('post_image_dec', 'Post Image Dec', ['class' => 'control-label']) !!}
    {!! Form::text('post_image_dec', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('post_image_dec', '<p class="help-block">:message</p>') !!}
</div>





<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
