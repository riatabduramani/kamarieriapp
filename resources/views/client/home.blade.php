@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                 @role('client')
                    <h1> Welcome back, <b>{{ Auth::user()->business->name }}</b> </h1>
                   
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
