<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('Backend.header')
    </head>
    <body>
        <div class="dashboard-main-wrapper">
        	@include('Backend.left')
        	@include('Backend.top')
            <div class="dashboard-wrapper">
                @yield('content')
                @include('Backend.bot')
            </div>
            
        </div>
    </body>
        @include('Backend.footer')
</html>