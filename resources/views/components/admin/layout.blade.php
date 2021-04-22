<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@lang('app.app_title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="font-sans antialiased text-gray-900 min-h-screen bg-gray-100">
    @include('admin.partials.header')
    <main class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        {{ $slot }}
    </main>
</body>
</html>