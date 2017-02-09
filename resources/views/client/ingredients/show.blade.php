@extends('layouts.app')
@section('content')
  <div class="container">
   <div class="row">
    <div class="col-md-4">
      @include('client.partials.menusettings')
    </div>
    <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Ingredient <b>{{ $ingredient->name }}</b></div>
                    <div class="panel-body">

                        <a href="{{ url('/client/ingredients/' . $ingredient->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Ingredient"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/client/ingredients', $ingredient->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Ingredient',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $ingredient->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $ingredient->name }} </td></tr><tr><th> Price </th><td> {{ $ingredient->price }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection