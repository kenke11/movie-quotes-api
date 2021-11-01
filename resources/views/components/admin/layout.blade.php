<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
    <header class="py-10">
        <form id="logout-form" class="text-right" method="POST" action="{{route('logout')}}">
            @csrf
            <button class="bg-red-300 border px-3 py-2 border-red-500 hover:bg-red-500 rounded-xl text-xl mr-4" type="submit">logout</button>
        </form>
    </header>
    <div class="m-auto  w-3/4 pt-20 flex">
        <aside class="w-max flex flex-col pt-10 px-10">
            <ul>
                <li class="mt-3">
                    <a href="{{route('admin.index')}}" class="pt-3 text-2xl {{request()->is('admin_panel') ? 'text-blue-500' : ''}}">movies</a>
                </li>
                <li class="mt-3">
                    <a href="{{route('movie.create')}}" class="pt-3 text-2xl  {{request()->is('admin_panel/movie/create') ? 'text-blue-500' : ''}}">create</a>
                </li>
            </ul>
        </aside>

        <main class="m-auto w-full">
            {{$slot}}
        </main>
    </div>
    @if(session()->has('success'))
        <div class="fixed bottom-10 right-10 bg-green-500 px-3 py-2 rounded-xl">
            <p class="text-white">{{session('success')}}</p>
        </div>
    @endif
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>
