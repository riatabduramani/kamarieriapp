@extends('layouts.app')
@section('content')
 <div class="container">
    <div class="row">
    <div class="col-md-4">
      @include('client.partials.menusettings')
    </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Products</div>
                    <div class="panel-body">

                        <a href="{{ url('/client/products/create') }}" class="btn btn-primary btn-xs" title="Add New Product"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                       
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th> Name </th><th> Ingredients </th><th> Price </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        
                                        <td>
                                            @foreach ( $item->ingredients as $ingredient)
                                                <label class="label label-warning">{{ $ingredient->name }}</label>
                                            @endforeach

                                        </td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            <a href="{{ url('/client/products/' . $item->id) }}" class="btn btn-success btn-xs" title="View Product"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/client/products/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Product"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/client/products', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Product" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Product',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $products->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection