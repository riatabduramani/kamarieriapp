@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
    <div class="col-md-4">
      @include('client.partials.menusettings')
    </div>            
     <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit category: <b>{{ $category->name }}</b></div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($category, [
                            'method' => 'PATCH',
                            'url' => ['/client/categories', $category->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('client.categories.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection