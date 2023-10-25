<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>The Blacklisted Student</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('fontawesome-free-6.4.2-web/css/all.min.css')}}" />
        
        <script src="/app.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="/app.css">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('components._header')
            <main>
                <div class="display-body">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>
