<article
    {{ $attributes->merge(['class' => 'mt-48']) }}
>
    <div>
        <img src="{{asset('storage/'.$movie->img)}}" alt="" class="flex justify-center text-center m-auto rounded-xl" width="700px">
    </div>

    <div  class="mt-16">
        <h1 class="flex justify-center text-center text-white text-5xl">
            @if(app()->getLocale() == 'en')
                “{{ substr($movie['quote_'.app()->getLocale()], 0, 50) }}@if(strlen($movie['quote_'.app()->getLocale()])>50)...@endif”
            @else
                “{{ substr($movie['quote_'.app()->getLocale()], 0, 100) }}@if(strlen($movie['quote_'.app()->getLocale()])>100)...@endif”
            @endif


        </h1>
    </div>


    <div  class="mt-20">
        <a href="{{asset('movie/'.$movie->id)}}" class="flex justify-center text-white text-5xl underline">
            {{ $movie['name_'.app()->getLocale()]}}
        </a>
    </div>
</article>
