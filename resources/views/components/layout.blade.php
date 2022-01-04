<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/img/logo.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/img/logo.png')}}">
    <title>Movie quotes</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body class="bg-gray-550">
    <aside class="fixed flex flex-col items-center justify-center h-screen ml-12">
        @foreach(config('app.available_locales') as $locale)
            <a
                href="{{route('lang', $locale)}}"
                class="text-2xl border border-white mt-3
                        rounded-full px-2 py-1.5
                        {{ app()->getLocale() == $locale ? 'text-black bg-white' : 'text-white' }}
                    "
            >{{$locale}}</a>
        @endforeach
    </aside>
    <main class="flex justify-center items-center">
        {{$slot}}
    </main>
</body>
</html>
