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
                      <th>Table Nr.</th>
                      <th>Order Nr.</th>
                      <th>Customer Nr.</th>
                      <th>Total sum</th>
                      <th>Date/Time</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($history as $his)
                        <tr>
                          <td>{{ $his->table_nr }}</td>
                          <td>{{ $his->order_nr }}</td>
                          <td>{{ $his->customer_nr }}</td>
                          <td>{{ $sum }}</td>
                          <td>{{ $his->created_at }}</td>
                          <td><a href="/client/history/{{ $his->order_nr }}" class="btn btn-primary btn-xs">View Order</a></td>
                        </tr>
                      @endforeach
                  </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
