@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Users Management
                	 <div class="pull-right">
	            		<a class="btn btn-success btn-xs" href="{{ route('users.create') }}"> Create New User</a>
			        </div>
                </div>
                <div class="panel-body">

				@if ($message = Session::get('success'))
					<div class="alert alert-success">
						<p>{{ $message }}</p>
					</div>
				@endif

				<table class="table table-bordered">
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Confirmed</th>
						<th>Status</th>
						<th>Roles</th>
						<th>Registered</th>
						<th width="280px">Action</th>
					</tr>
				@foreach ($data as $key => $user)
				<tr>
					<td>{{ ++$i }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>
						@if($user->confirmed == 1) 
							<label class="label label-success" aria-hidden="true"><span class="glyphicon glyphicon-ok"></span></label>
						@else 
							<label class="label label-danger" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></label>
						@endif

					</td>
					<td> @if($user->is_active == 1) 
							<span class="label label-success" aria-hidden="true">Active</span>
						@else 
							<span class="label label-danger" aria-hidden="true">Disabled</span>
						@endif</td>
					<td>
						@if(!empty($user->roles))
							@foreach($user->roles as $v)
								<label class="label label-success">{{ $v->display_name }}</label>
							@endforeach
						@endif
					</td>
					<td>
						{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}
					</td>
					<td>
						<a class="btn btn-warning btn-xs" href="{{ route('users.show',$user->id) }}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
						<a class="btn btn-primary btn-xs" href="{{ route('users.edit',$user->id) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
		             	{!! Form::open([
                            'method'=>'DELETE',
                            'route' => ['users.destroy', $user->id],
                            'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete User" />', array(
                                'type' => 'submit',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => 'Delete User',
                                'onclick'=>'return confirm("Confirm delete?")'
                        )) !!}

			        	{!! Form::close() !!}
					</td>
				</tr>
				@endforeach
				</table>

				{!! $data->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

