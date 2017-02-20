@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Show User informations
        </a>
        <div class="pull-right">
            <a class="btn btn-primary btn-xs" href="{{ route('users.index') }}"> Back</a>
        </div>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
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
		        <div class="col-xs-12 col-sm-12 col-md-12">
		            <div class="form-group">
		                <strong>Confirmed:</strong>
		                @if($user->confirmed == 1) 
							<label class="label label-success" aria-hidden="true"><span class="glyphicon glyphicon-ok"></span></label>
						@else 
							<label class="label label-danger" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></label>
						@endif
		            </div>
		        </div>

		        <div class="col-xs-12 col-sm-12 col-md-12">
		            <div class="form-group">
		                <strong>Status:</strong>
		               @if($user->is_active == 1) 
							<span class="label label-success" aria-hidden="true">Active</span>
						@else 
							<span class="label label-danger" aria-hidden="true">Disabled</span>
						@endif
		            </div>
		        </div>
      </div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
      <span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span>
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Show Business informations
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        	<div class="col-xs-12 col-sm-12 col-md-12">
		            <div class="form-group">
		                <strong>Business name:</strong>
		                	@if(!empty($user->business))
		              		{{ $user->business->name }}
							@endif
		            </div>
		     </div>
		     <div class="col-xs-12 col-sm-12 col-md-12">
		            <div class="form-group">
		                <strong>Address:</strong>
		                	@if(!empty($user->business))
		              		{{ $user->business->address }}
							@endif
		            </div>
		     </div>
		     <div class="col-xs-12 col-sm-12 col-md-12">
		            <div class="form-group">
		                <strong>Zip:</strong>
		                	@if(!empty($user->business))
		              		{{ $user->business->zip }}
							@endif
		            </div>
		     </div>
		     <div class="col-xs-12 col-sm-12 col-md-12">
		            <div class="form-group">
		                <strong>City:</strong>
		                	@if(!empty($user->business))
		              		{{ $user->business->city }}
							@endif
		            </div>
		     </div>
		      <div class="col-xs-12 col-sm-12 col-md-12">
		            <div class="form-group">
		                <strong>Country:</strong>
		                @foreach($country as $countr)
		                	{{ $countr->name }}
		                @endforeach
		            </div>
		     </div>
		     <div class="col-xs-12 col-sm-12 col-md-12">
		            <div class="form-group">
		                <strong>Phone:</strong>
		                	@if(!empty($user->business))
		              		{{ $user->business->phone }}
							@endif
		            </div>
		     </div>
		     <div class="col-xs-12 col-sm-12 col-md-12">
		            <div class="form-group">
		                <strong>Web:</strong>
		                	@if(!empty($user->business))
		              		{{ $user->business->web }}
							@endif
		            </div>
		     </div>
		     <div class="col-xs-12 col-sm-12 col-md-12">
		            <div class="form-group">
		                <strong># of QRCodes:</strong>
		                	@if(!empty($user->business))
		              		{{ $user->business->nr_tables }}
							@endif
		            </div>
		     </div>
      </div>
    </div>
  </div>

</div>

        </div>
    </div>
</div>
@endsection