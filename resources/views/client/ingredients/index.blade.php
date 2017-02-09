@extends('layouts.app')
@section('content')
  <div class="container">
   <div class="row">
    <div class="col-md-4">
      @include('client.partials.menusettings')
    </div>
    <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Ingredients</div>
                    <div class="panel-body">

                        <a href="{{ url('/client/ingredients/create') }}" class="btn btn-primary btn-xs" title="Add New Ingredient"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                       <th> Name </th><th> Price </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($ingredients as $item)
                                    <tr>
                                        
                                        <td>{{ $item->name }}</td><td>{{ $item->price }}</td>
                                        <td>
                                            <a href="{{ url('/client/ingredients/' . $item->id) }}" class="btn btn-success btn-xs" title="View Ingredient"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/client/ingredients/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Ingredient"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/client/ingredients', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Ingredient" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Ingredient',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $ingredients->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection