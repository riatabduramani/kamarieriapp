@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
       
    <div class="col-md-4">
      @include('client.partials.menusettings')
    </div>
    <div class="col-md-8">
    <a href="/client/categories/create" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Category</a>
    <br />
    <br />
        @foreach($categories as $cat)
          <div class="panel-group" role="tablist">
             <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="collapseListGroupHeading{{ $cat->id }}">
                   <h4 class="panel-title"><span class="badge">{{ $cat->products->count() }}</span> <a href="#collapseListGroup{{ $cat->id }}" class="" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="collapseListGroup{{ $cat->id }}">{{ $cat->name }}</a>
                                        {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/client/categories', $cat->id],
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
                                           
                                            <a href="{{ url('/client/categories/' . $cat->id . '/edit') }}" title="Edit Category"><span class="glyphicon glyphicon-pencil pull-right" aria-hidden="true"/></span></a>
                   </h4>

                   

                </div>
                @if($cat->products->count() != 0 )
                <div class="panel-collapse collapse" role="tabpanel" id="collapseListGroup{{ $cat->id }}" aria-labelledby="collapseListGroupHeading{{ $cat->id }}" aria-expanded="true">
                   <ul class="list-group">
                      @foreach ($cat->products as $product)
                        <li class="list-group-item"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> {{ $product->name }} 
                        </li>
                      @endforeach
                   </ul>
                </div>
                @endif
             </div>
          </div>
        @endforeach
    </div>
     </div>
      </div>


@endsection
