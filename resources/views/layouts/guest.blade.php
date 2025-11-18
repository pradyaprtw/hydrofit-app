<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'HydroFit') }}</title>
        
        {{-- PWA --}}
        {{-- @laravelPWA --}}

        {{-- Tailwind CDN (JURUS SAKTI) --}}
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        {{-- Slot ini akan diisi oleh konten Login/Register tadi --}}
        {{ $slot }}
    </body>
</html>