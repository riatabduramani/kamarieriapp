<div class="form-group {{ $errors->has('bname') ? 'has-error' : ''}}">
    {!! Form::label('bname', 'Business Title', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('bname', $user->business->name , ['class' => 'form-control','required']) !!}
        {!! $errors->first('bname', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('address', 'Address', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('address', $user->business->address, ['class' => 'form-control', 'required']) !!}
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('country') ? 'has-error' : ''}}">
    {!! Form::label('country', 'Country', ['class' => 'col-md-4 control-label']) !!}

    <div class="col-md-6">
        {!! Form::select('country', $countryList, $selected, ['class' => 'form-control']) !!}
        {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
    {!! Form::label('city', 'City', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('city', $user->business->city, ['class' => 'form-control', 'required']) !!}
        {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('zip') ? 'has-error' : ''}}">
    {!! Form::label('zip', 'Zip', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('zip', $user->business->zip, ['class' => 'form-control', 'required']) !!}
        {!! $errors->first('zip', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    {!! Form::label('phone', 'Phone', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('phone', $user->business->phone, ['class' => 'form-control', 'required']) !!}
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('web') ? 'has-error' : ''}}">
    {!! Form::label('web', 'Web', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('web', $user->business->web, ['class' => 'form-control']) !!}
        {!! $errors->first('web', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('nr_tables') ? 'has-error' : ''}}">
    {!! Form::label('nr_tables', 'Nr. of tables/rooms', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-3">
        <select name="nr_tables" id="nr_tables" class="form-control">
            @for($i=1; $i < 51; $i++)
                <option value="{{$i}}" @if($user->business->nr_tables == $i) selected @endif>{{$i}}</option>
            @endfor
        </select>
        {!! $errors->first('nr_tables', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('currency') ? 'has-error' : ''}}">
    {!! Form::label('currency', 'Currency', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <select name="currency" id="currency" class="form-control">
            @foreach($currency as $curr)
                <option value="{{$curr->symbol_native}}" @if($user->business->currency == $curr->symbol_native) selected @endif>{{ $curr->name }} ({{ $curr->symbol_native}})</option>
            @endforeach
        </select>
        {!! $errors->first('currency', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>