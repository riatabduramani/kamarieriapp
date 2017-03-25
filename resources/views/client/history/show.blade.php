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
                 @foreach($historydata as $his)
                  Order nr: {{ $his->order_nr }}<br />
                  Customer nr: {{ $his->customer_nr }}<br />
                  Table nr: {{ $his->table_nr }}<br />
                  Date: {{ $his->created_at }}
                 @endforeach
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

