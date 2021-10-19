<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <header class="py-10">
        <h1 class="text-center bold text-3xl">Admin panel - {{auth()->user()->username}}</h1>

        <form id="logout-form" method="POST" action="{{asset('admin_panel/logout')}}">
            @csrf
            <button type="submit">logout</button>
        </form>
    </header>



    <div class="m-auto  w-3/4 pt-20 flex">
        <aside class="w-max flex flex-col pt-10 px-10">
            <ul>
                <li class="mt-3">
                    <a href="{{url('admin_panel')}}" class="pt-3 text-2xl {{request()->is('admin_panel') ? 'text-blue-500' : ''}}">movies</a>
                </li>
                <li class="mt-3">
                    <a href="{{url('admin_panel/movie/create')}}" class="pt-3 text-2xl  {{request()->is('admin_panel/movie/create') ? 'text-blue-500' : ''}}">create</a>
                </li>
            </ul>


        </aside>

        <main class="m-auto w-full">
            {{$slot}}
        </main>
    </div>

    @if(session()->has('success'))
        <div class="fixed b-5 r-5 bg-green-500">
            <p class="text-white">{{session('success')}}</p>
        </div>

    @endif


</body>
</html>
