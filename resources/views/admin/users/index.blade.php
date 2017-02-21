@extends('layouts.app')
 
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Client Management
                	 <div class="pull-right">
	            		<a class="btn btn-success btn-xs" href="{{ route('users.create') }}"> Create New User</a>
			        </div>
                </div>
                <div class="panel-body">

				<div class="table-responsive">

				<table class="table table-striped table-hover">
					<thead>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Confirmed</th>
						<th>Status</th>
						<th>Roles</th>
						<th>Registered</th>
						<th width="280px">Action</th>
					</thead>
				@foreach ($data as $key => $user)
				<tr>
					<td>{{ ++$i }}</td>
					<td>{{ $user->name }} </td>
					<td>{{ $user->email }}</td>
					<td>{!! $user->showConfirmedOf($user) !!}</td>
					<td>{!! $user->showStatusOf($user) !!}</td>
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
					<td> @if(!empty($user->business->id))
							<a class="btn btn-warning btn-xs" href="{{ route('users.show',$user->id) }}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
						@else
							<a class="btn btn-warning btn-xs disabled" href="{{ route('users.show',$user->id) }}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
						@endif

						<a class="btn btn-primary btn-xs" href="{{ route('users.edit',$user->id) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
						@if($user->id == Auth::user()->id)
							{!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete User" />', array(
                                'type' => 'submit',
                                'id' => 'delete',
                                'class' => 'btn btn-danger btn-xs disabled',
                                'title' => 'Delete User'
                                //'onclick'=>'return confirm()',
                        	)) !!}
						@else
		             	{!! Form::open([
                            'method'=>'DELETE',
                            'route' => ['users.destroy', $user->id],
                            'style' => 'display:inline',
                            'name' => 'myform',
                            'id' => 'myform',
                            'class'=> 'myform',
                        ]) !!}
                        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete User" />', array(
                                'type' => 'submit',
                                'id' => 'delete',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => 'Delete User'
                                //'onclick'=>'return confirm()',
                        )) !!}
			        	{!! Form::close() !!}
			        	@endif
					</td>
				</tr>
				@endforeach
				</table>
				</div>
				{!! $data->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

