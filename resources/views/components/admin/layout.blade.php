<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{asset('js/app.js')}}"></script>
</head>
<body>
    <header
        class="py-10">
        <form id="logout-form" class="text-right" method="POST" action="{{route('logout')}}">
            @csrf
            <button class="bg-red-300 border px-3 py-2 border-red-500 hover:bg-red-500 rounded-xl text-xl mr-4 transition duration-500 ease-in" type="submit">logout</button>
        </form>
    </header>
    <div class="m-auto  w-3/4 pt-20 flex">
        <x-sidebar />

        <main class="m-auto w-full">
            {{$slot}}
        </main>
    </div>
    @if(session()->has('success'))
        <x-success-message />
    @endif
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>
