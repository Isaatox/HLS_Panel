<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Seal_of_the_United_States_Department_of_Homeland_Security.svg/800px-Seal_of_the_United_States_Department_of_Homeland_Security.svg.png" type="image/x-icon">
        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @routes
        @vite('resources/js/app.js')
        @inertiaHead
    </head>
    <body class="font-sans antialiased bg-slate-800 h-full">
        @inertia
    </body>
</html>
