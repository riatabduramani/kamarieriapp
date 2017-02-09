@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-4">
      @include('client.partials.menusettings')
    </div>
    <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Categories
                         <a href="{{ url('/client/categories/create') }}" class="pull-right" title="Add New Category">Add New Category &nbsp;<span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                    </div>
                    <div class="panel-body">

<ul class="list-group">
 @foreach($categories as $item)
  <li class="list-group-item">
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/client/categories', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash pull-right" aria-hidden="true" title="Delete Category" /></span>', array(
                                                        'type' => 'submit',
                                                        'class' => 'pull-right',
                                                        'style' => 'background: none;border: none;color: #f30000;',
                                                        'title' => 'Delete Category',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                            &nbsp;
                                            <a href="{{ url('/client/categories/' . $item->id . '/edit') }}" title="Edit Category"><span class="glyphicon glyphicon-pencil pull-right" aria-hidden="true"/></span></a>
    {{ $item->name }}
  </li>
@endforeach
</ul>
<div class="pagination-wrapper"> {!! $categories->render() !!} </div>

                    </div>
                </div>

    </div>
    </div>
@endsection
