@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Role Management
                	 <div class="pull-right">
			            <a class="btn btn-success btn-xs" href="/admin/roles/create"> Create New Role</a>
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
							<th>No</th>
							<th>Name</th>
							<th>Description</th>
							<th width="280px">Action</th>
						</tr>
					@foreach ($roles as $key => $role)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $role->display_name }}</td>
						<td>{{ $role->description }}</td>
						<td>
							<a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
							
							<a class="btn btn-primary" href="/admin/roles/{{ $role->id }}/edit">Edit</a>
							

							
							{!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
				            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
				        	{!! Form::close() !!}
				        	
						</td>
					</tr>
					@endforeach
					</table>

					{!! $roles->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

