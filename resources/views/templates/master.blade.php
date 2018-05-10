<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/bulma.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>@yield('title')</title>
</head>
<body>
    @include('templates.header')
    

    <div class="container" style="margin-top: 20px">
        
            {{-- <div class="columns">
                <div class="column is-2">is-four-fifths</div>
                <div class="column is-10">Auto</div>
                
            </div> --}}
        
        <div class="columns">
        
            <div class="column is-2">
                @include('templates.nav')
            </div>

            <div class="column is-10">
                @yield('content')
            </div>
            
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
    <script src="{{ asset('js/main.js')}}"></script> 

    @yield('scripts')
    
</body>
</html>