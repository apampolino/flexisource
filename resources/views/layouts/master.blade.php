<!DOCTYPE html>
<html>
    <head>
        @yield('css')
    </head>
    <body>
        <nav>
        </nav>
        <main>
            <div class="container">
                @yield('content')
            </div>
        </main>
        @yield('js')
    </body>
</html>