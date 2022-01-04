<div x-data="{ show: false }">
    <div class="w-full bg-gray-200 border-gray-500 p-6 rounded-xl my-5 transition duration-1000">

        <form method="POST" action="{{route('quote.delete', $quote->id)}}" class="mb-3 w-full text-right">
            @csrf
            @method('DELETE')
            <button class="font-bold text-red-500">X</button>
        </form>

        <h3 class="block mb-2 uppercase font-bold text-lx text-gray-700 mt-3">MOVIE QUOTE IN GEORGIAN</h3>
        <p>{{$quote->getTranslation('quote', 'ge')}}</p>

        <h3 class="block mb-2 uppercase font-bold text-lx text-gray-700 mt-5">MOVIE quote IN ENGLISH</h3>

        <p>{{$quote->getTranslation('quote', 'en')}}</p>

        <div class="mb-6">
            <h3 class="block mb-2 uppercase font-bold text-lx text-gray-700 mt-5">Quote img</h3>

            <img src="{{asset('storage/'.$quote->quote_img)}}" alt="">
        </div>

        <div class="mb-6 mt-6" >
            <button @click="show = true" class="w-full bg-blue-300 hover:bg-blue-500 py-3 rounded-xl transition duration-300">Edit quote</button>
        </div>
    </div>

    <div class="w-full bg-blue-200 border-blue-300 p-6 rounded-xl my-5 transition duration-1000" x-show="show">

        <x-admin.edit-quote-form :quote="$quote"/>

    </div>
</div>
