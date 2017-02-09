@extends('layouts.app')
@section('content')
  <div class="container">
        <div class="row">
    <div class="col-md-4">
      @include('client.partials.menusettings')
    </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Product <b>{{ $product->name }}</b></div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($product, [
                            'method' => 'PATCH',
                            'url' => ['/client/products', $product->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('client.products.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection