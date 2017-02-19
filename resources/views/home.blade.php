@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard
                </div>

                <div class="panel-body">
                @role('super-admin')
                    <h1>Welcome Admin</h1>
                @endrole
                 @role('client')

                    <h1> Welcome, <b>{{ Auth::user()->business->name }}</b> </h1>
                    <a href="/client/generateqrcodes" class="btn  btn-success"><span class="glyphicon glyphicon-qrcode" aria-hidden="true"></span> Generate QRCodes</a>
                @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
