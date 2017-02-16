@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name & Surname</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div> 
                </div>
            </div>

              <div class="panel panel-default">
                <div class="panel-heading">Enter your business details</div>
                <div class="panel-body">
                        <div class="form-group{{ $errors->has('businessname') ? ' has-error' : '' }}">
                            <label for="businessname" class="col-md-4 control-label">Business name</label>

                            <div class="col-md-6">
                                <input id="businessname" type="text" class="form-control" name="businessname" value="{{ old('businessname') }}" required autofocus>

                                @if ($errors->has('businessname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('businessname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                          <label for="address" class="col-md-4 control-label">Address</label>
                          <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus>

                                @if ($errors->has('businessname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('businessname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}">
                          <label for="country_id" class="col-md-4 control-label">Country</label>
                          <div class="col-md-6">
                              
                               {!! Form::select('country_id', App\Country::pluck('name', 'id'), null, ['class'=> 'form-control','id'=>'country_id']) !!}

                                @if ($errors->has('country_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                          <label for="city" class="col-md-4 control-label">City</label>
                          <div class="col-md-3">
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required autofocus>

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                             <label for="city" class="col-md-1 control-label">Zip</label>
                             <div class="col-md-2">
                                <input id="zip" type="text" class="form-control" name="zip" value="{{ old('zip') }}" required autofocus>
                                @if ($errors->has('zip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                          <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                          <label for="phone" class="col-md-4 control-label">Phone</label>

                          <div class="col-md-6">
                                <input id="phone" type="tel" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="+1 (999) 999 9999" required autofocus>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                          <label for="web" class="col-md-4 control-label">Website</label>
                          <div class="col-md-6">
                                <input id="web" type="text" class="form-control" name="web" value="{{ old('web') }}" autofocus>
                            </div>
                             @if ($errors->has('web'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('web') }}</strong>
                                    </span>
                                @endif
                        </div>

                         <div class="form-group{{ $errors->has('tables') ? ' has-error' : '' }}">
                            <label for="tables" class="col-md-4 control-label">How many QR Codes?</label>

                            <div class="col-md-6">
                               
                               <select class="form-control" name="tables">
                                  @for($x = 1; $x <= 50; $x++)
                                    <option value="{{$x}}">{{ $x}}</option>
                                  @endfor
                                </select>
                                <p class="help-block">Number of tables/rooms for generating QR Codes</p>
                                @if ($errors->has('tables'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tables') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
           </form>
        </div>
    </div>
</div>
@endsection
