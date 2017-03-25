<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body>
    

        @role('client')
            <div class="row">
                
                @for($x = 1; $x <= Auth::user()->business->nr_tables; $x++ )
                    <div style="float: left;">
                        #{{ $x }}<br />
                        {!! QrCode::size(220)->generate(Auth::user()->id.'-'.$x) !!}
                        <br /><br />
                    </div>
                @endfor 
             </div>            
       @endrole


   

    <!-- Scripts -->
    <script src="/js/app.js"></script>    
</body>
</html>


