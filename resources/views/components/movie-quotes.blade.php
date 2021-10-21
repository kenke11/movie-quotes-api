<article
    {{ $attributes->merge(['class' => 'mt-20']) }}
>
    <div  class="mb-20">
        <h2 class="flex  text-white text-5xl" >
            {{ \Illuminate\Support\Facades\App::getLocale() == 'en' ? $movie->name_en : $movie->name_ge }}
        </h2>
    </div>

    <div class="bg-white rounded-xl">
        <img src="{{asset('storage/'.$movie->img)}}" alt="" class="flex justify-center text-center m-auto rounded-xl" width="700px">
        <div class="py-10 ">
            <h2  class="flex justify-center  text-5xl text-gray-800">
                {{ $movie['name_'.app()->getLocale()] }}
            </h2>
        </div>
    </div>

    @foreach($movie->quotes as $quote)
        <div class="bg-white rounded-xl my-10">
            <img src="{{asset('storage/'.$quote->quote_img)}}" alt="" class="flex justify-center text-center m-auto rounded-xl" width="700px">
            <div class="py-10 ">
                <h2  class="flex justify-center  text-5xl text-gray-800">
                    {{ $quote['quote_'.app()->getLocale()]}}
               </h2>
            </div>
        </div>
    @endforeach
</article>
