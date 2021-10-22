<article
    {{ $attributes->merge(['class' => 'mt-36']) }}
>
    <div  class="top-0 py-5 fixed w-full" style="background: #3D3B3B">
        <h2 class="flex  text-white text-5xl" >
            {{ $movie['name_'.app()->getLocale()] }}
        </h2>
    </div>

    <div class="bg-white rounded-xl max-w-2xl m-auto">
        <img src="{{asset('storage/'.$movie->img)}}" alt="" class="flex justify-center text-center m-auto rounded-xl" width="700px">
        <div class="py-10 overflow-y-auto max-h-36">
            <p  class="flex justify-center  text-xl text-gray-800 px-5">
                {!! $movie['quote_'.app()->getLocale()]  !!}
            </p>
        </div>
    </div>
        @foreach($movie->quotes as $quote)
            <div class="bg-white rounded-xl my-10 max-w-2xl m-auto">
                <img src="{{asset('storage/'.$quote->quote_img)}}" alt="" class="flex justify-center text-center m-auto rounded-xl" width="700px">
                <div class="py-3 overflow-y-auto max-h-36">
                    <p  class="flex justify-center  text-xl text-gray-800 px-5">
                        {!!  $quote['quote_'.app()->getLocale()]  !!}
                   </p>
                </div>
            </div>
        @endforeach
</article>
