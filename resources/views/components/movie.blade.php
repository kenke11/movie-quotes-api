<article
    {{ $attributes->merge(['class' => 'mt-48']) }}
>
    <div>
        <img src="{{asset('storage/'.$movie->img)}}" alt="" class="flex justify-center text-center m-auto rounded-xl" width="700px">
    </div>

    <div  class="mt-16">
        <h1 class="flex justify-center text-center text-white text-5xl">
            @if($quote == null)
                {{__('dont_have_quote')}}
            @else
                @if(app()->getLocale() == 'en')
                    “{{ substr(__($quote), 0, 50) }}@if(strlen(__($quote))>50)...@endif”
                @elseif(app()->getLocale() == 'ge')
                    “{{ substr(__($quote), 0, 150) }}@if(strlen(__($quote))>150)...@endif”
                @endif
            @endif
        </h1>
    </div>


    <div  class="mt-20">
        <a href="{{asset('movie/'.$movie->id)}}" class="flex justify-center text-white text-5xl underline">
            {{__($movie->name)}}
        </a>
    </div>
</article>
