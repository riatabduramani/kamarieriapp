@extends('layouts.app')
@section('content')
  <div class="container">
        <div class="row">

         @if (session('statusprofileupdate'))
                <div class="alert alert-success">
                    {{ session('statusprofileupdate') }}
                </div>
            @endif
    <div class="col-md-5">
      <div class="panel panel-default">
                <div class="panel-heading">My Profile</div>
                <div class="panel-body">
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {!! Form::model($user, [
                        'method' => 'PATCH',
                        'url' => ['/client/profile', $user->id],
                        'class' => 'form-horizontal',
                        'files' => true
                    ]) !!}

                    @include ('client.profile.form', ['submitButtonText' => 'Update'])

                    {!! Form::close() !!}
                </div>
      </div>
    </div>
            <div class="col-md-7">
                <div class="panel panel-default">
                    <div class="panel-heading">My Business</b></div>
                    <div class="panel-body">

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {!! Form::model($user, [
                        'method' => 'PATCH', 
                        'url' => ['/client/business', $user->business->id],
                        'class' => 'form-horizontal',
                        'files' => true
                        ]) !!}


                    @include ('client.profile.businessform', ['submitButtonText' => 'Update'])

                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection