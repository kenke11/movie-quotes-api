
<article
    {{ $attributes->merge(['class' => 'mt-48']) }}
>
    <div>
        <img src="{{asset('img/images.jpeg')}}" alt="" class="flex justify-center text-center m-auto rounded-xl" width="700px">
    </div>

    <div  class="mt-16">
        <h1 class="flex justify-center text-center text-white text-5xl">
            @lang('dont_have_movie')
        </h1>
    </div>

</article>
