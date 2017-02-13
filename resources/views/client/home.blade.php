@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in User!
                    @role('admin')
                        <p>This is visible to users with the admin role. </p>
                    @endrole

                    @role('client')
                        <p>This is visible to users with the client role. </p>

                        @for($x = 1; $x <= Auth::user()->business->nr_tables; $x++ )

                        {!! QrCode::size(200)->generate($x) !!}
                        
                        @endfor                
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
