<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Description', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('description', null, ['class' => 'form-control', 'rows'=>'3']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    {!! Form::label('price', 'Price', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
    <div class="input-group">
     <div class="input-group-addon">$</div>
        {!! Form::number('price', null, ['class' => 'form-control']) !!}
    <div class="input-group-addon">.00</div>
    </div>
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
    {!! Form::label('category', 'Category', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {{ Form::select('category_id', $category, null, array('class' => 'form-control')) }}
        {!! $errors->first('category', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="well">
<h4>Select <span class="label label-warning">Ingredients</span></h4>
   <div class="form-group">
    @foreach($ingredients as $ingd => $ing)
    <div class="col-md-3">
            <label class="checkbox-inline">
                {!! Form::checkbox('ingredients[]', $ingd, null) !!}
                {{ $ing }}
            </label>
        </div>
    @endforeach
    </div>
</div>



<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>


