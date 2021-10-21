<article


    {{ $attributes->merge(['class' => 'mt-48']) }}
>
    <div>
        <img src="{{asset('storage/'.$movie->img)}}" alt="" class="flex justify-center text-center m-auto rounded-xl" width="700px">
    </div>

    <div  class="mt-16">
        <h1 class="flex justify-center text-center text-white text-5xl">
            “{{ \Illuminate\Support\Facades\App::getLocale() == 'en' ? $movie->name_en : $movie->name_ge }}”
        </h1>
    </div>

    <div  class="mt-20">
        <a href="{{asset('movie/'.$movie->id)}}" class="flex justify-center text-white text-5xl underline">
            {{ \Illuminate\Support\Facades\App::getLocale() == 'en' ? $movie->quote_en : $movie->quote_ge }}
        </a>
    </div>
</article>
