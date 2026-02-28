<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        <title>{{ $title ?? config('app.name') }}</title>

        @livewireStyles
        <style>
            body{
                overflow-x: none;
            }
        </style>
    </head>
    <body>
        
        <div style="display: flex; min-height: 70vh;">
            @include('sidebar.sidebar1')
            <div style="flex: 1; display: flex; flex-direction: column;">
                @include('navbar.navbar1')
                <main style="padding: 20px;">
                    {{ $slot }}
                </main>
            </div>
        </div>

        @livewireScripts
    </body>
</html>
