<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Arafath">
    <meta name="description" content="Codeline.io">

    <title>{{ config('app.name') }}</title>

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <script>
        window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
                'siteName'  => config('app.name'),
                'apiDomain' => config('app.url').'/api',
                'fileUrl' => config('app.url'),
            ]) !!}
            window.server_data = "{!! isset($data)? addslashes(json_encode($data)) : '' !!}"
    </script>
</head>
<body>
<div id="app">
    <app></app>
</div>

<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
