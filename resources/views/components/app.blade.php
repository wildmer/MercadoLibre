<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title --}}
    <title>{{ env('APP_NAME') }} | {{ $title ?? 'Productos' }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-">

	{{-- Content --}}
    <main id="app">
		{{-- Menu --}}
		<x-menu />

        <div class="container mt-4">
            <x-alerts />
        </div>

        {{ $slot }}
		{{-- TODO: Usar vue-route --}}
    </main>

    {{ $scripts ?? '' }}
</body>

</html>
