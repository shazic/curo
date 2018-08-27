<!doctype html>
<html>
    
    @include('layouts.partials.head')

    <body>
        
        <div id="app">
            
            @yield('content')
        </div>
        
        @yield('customjs')
        
    </body>

</html>