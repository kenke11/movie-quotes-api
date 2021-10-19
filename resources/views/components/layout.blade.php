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
<body style="background: #3D3B3B">

    <aside class="fixed flex flex-col items-center justify-center h-screen ml-12">

        <a href="" class="text-2xl border border-white rounded-full px-2 py-1.5 text-white">en</a>
        <a href="" class="text-2xl mt-3 bg-white border border-white rounded-full px-2 py-1.5 text-black">ka</a>

    </aside>

    <main class="flex justify-center items-center h-screen">
        {{$slot}}
    </main>


</body>
</html>