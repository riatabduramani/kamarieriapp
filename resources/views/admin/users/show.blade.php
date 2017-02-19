@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Show User
                	 <div class="pull-right">
			            <a class="btn btn-primary btn-xs" href="{{ route('users.index') }}"> Back</a>
			        </div>
                </div>
                <div class="panel-body">
				<div class="col-xs-12 col-sm-12 col-md-12">
		            <div class="form-group">
		                <strong>Name:</strong>
		                {{ $user->name }}
		            </div>
		        </div>

		        <div class="col-xs-12 col-sm-12 col-md-12">
		            <div class="form-group">
		                <strong>Email:</strong>
		                {{ $user->email }}
		            </div>
		        </div>

		        <div class="col-xs-12 col-sm-12 col-md-12">
		            <div class="form-group">
		                <strong>Roles:</strong>
		                @if(!empty($user->roles))
							@foreach($user->roles as $v)
								<label class="label label-success">{{ $v->display_name }}</label>
							@endforeach
						@endif
		            </div>
		        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection