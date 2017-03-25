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
                <div class="row">
                <div class="col-md-7">
                  <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Order nr: {{ $orders->id }}<br />
                  <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Customer nr: {{ $orders->customer_nr }}<br />
                  <span class="glyphicon glyphicon-record" aria-hidden="true"></span> Table nr: {{ $orders->table_nr }}<br />
                  <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Date: {{ $orders->created_at }}<br />
                  <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Comment: {{ $orders->comment }}
                </div>
                <div class="col-md-5">
                <div class="table-responsive">
                  <table class="table table-bordered">
                  <thead>
                    <tr class="active">
                      <th>Product</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                   <tbody>
                        @foreach($history as $his)
                          <tr>
                            <td>{{ $his->product_name }}</td>
                            <td>{{ $his->price }}</td>
                          </tr>
                        @endforeach
                        <tfoot>
                          <tr class="active">
                            <th>Total:</th>
                            <th>{{ $sum }}</th>
                          </tr>
                        </tfoot>
                    </tbody>
                  </table>
                  </div>
                </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

