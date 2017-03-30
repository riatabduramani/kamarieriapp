@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Order history
                </div>
                <div class="panel-body">
                  <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Order Nr.</th>
                      <th>Table Nr.</th>
                      <th>Customer</th>
                      <th>Seen/Unseen</th>
                      <th>Sum</th>
                      <th>Date/Time</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($history as $his)
                        <tr> 
                          <td>{{ $his->id }}</td>
                          <td>{{ $his->table_nr }}</td>
                          <td>{{ $his->token }}</td>
                          <td>{!! $his->seenUnseen($his) !!}</td>
                          <td>{{ $his->sumCount->total }}</td>
                          <td>{{ $his->created_at }}</td>
                          <td><a href="/client/history/{{ $his->id }}" class="btn btn-primary btn-xs">View Order</a></td>
                        </tr>
                      @endforeach
                  </tbody>
                  </table>
                  {!! $history->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

