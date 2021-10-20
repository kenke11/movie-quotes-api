<article
    {{ $attributes->merge(['class' => '']) }}
>
    <div>
        <img src="{{asset('storage/'.$movie->img)}}" alt="" class="flex justify-center text-center m-auto rounded-xl" width="700px">
    </div>

    <div  class="mt-16">
        <h1 class="flex justify-center text-center text-white text-5xl">“{{$movie["name_" . app()->currentLocale()]}}”</h1>
    </div>


    <div  class="mt-20">
        <a href="{{asset('movie/'.$movie->id)}}" class="flex justify-center text-white text-5xl underline">{{$movie['quote_' . app()->currentLocale()]}}</a>
    </div>

</article>
