<x-admin.layout>

    <section class="px-5 py-5 ">
        <main class=" ml-10 mt-10 lg:flex">
            <form method="POST" action="{{asset('admin_panel/movie/update/'.$movie->id)}}" enctype="multipart/form-data" class="h-full bg-gray-200 border-gray-500 p-6 rounded-xl w-1/2 mx-5">
                @csrf
                <h1 class="text-center font-bold text-xl">Edit movie quotes</h1>
                <div class="mb-6 mt-6">

                    <label for="name_ge" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Movie name in georgian
                    </label>

                    <input
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="name[ge]"
                        id="name_ge"
                        value="{{$movie->getTranslation('name', 'ge')}}"
                        required
                    >

                    @error('name.ge')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">

                    <label for="name_en" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Movie name in english
                    </label>

                    <input
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="name[en]"
                        id="name_en"
                        value="{{$movie->getTranslation('name', 'en')}}"
                        required
                    >

                    @error('name.en')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">

                    <label for="img" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Movie image
                    </label>

                    <img src="{{asset('storage/'.$movie->img)}}" class="py-3" alt="">

                    <input
                        class="border border-gray-400 p-2 w-full"
                        type="file"
                        name="img"
                        id="img"
                    >

                    @error('img')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">
                    <button
                        type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                    >
                        Submit
                    </button>
                </div>

            </form>

            <div class="w-1/2">
                <button
                    class="add_new_quote_btn m-auto w-full rounded-xl bg-green-300 py-5 text-center border border-green-500 hover:bg-green-500 transition font-bold"
                >
                    Add new quote
                </button>

                <form
                    method="POST"
                    action="{{route('quote-store', $movie->id)}}"
                    class="quote_form hidden opacity-0 bg-green-200 border border-green-500 p-6 rounded-xl  my-5 transition duration-1000"
                    enctype="multipart/form-data"
                >
                    @csrf

                    <h1 class="text-center font-bold text-xl">Add movie quote</h1>

                    <div class="mb-6 mt-6">

                        <label for="quote_ge" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Movie quote in georgian
                        </label>

                        <textarea
                            class="border border-gray-400 p-2 w-full"
                            name="quote[ge]"
                            id="quote_ge"
                            required
                        ></textarea>

                        @error('quote.ge')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror

                    </div>

                    <div class="mb-6">

                        <label for="quote_en" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Movie quote in english
                        </label>

                        <textarea
                            class="border border-gray-400 p-2 w-full"
                            name="quote[en]"
                            id="quote_en"
                            required
                        ></textarea>

                        @error('quote.en')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror

                    </div>

                    <div class="mb-6">

                        <label for="quote_img" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Quote image
                        </label>

                        <input
                            class="border border-gray-400 p-2 w-full"
                            type="file"
                            name="quote_img"
                            id="quote_img"
                        >

                        @error('quote_img')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror

                    </div>

                    <div class="mb-6 mt-6">
                        <button class="w-full bg-blue-300 hover:bg-blue-500 py-3 rounded-xl transition duration-300">Add quote</button>
                    </div>

                </form>

                @foreach($quotes as $quote)
                    <div x-data="{ show: false }">
                        <div class="w-full bg-gray-200 border-gray-500 p-6 rounded-xl my-5 transition duration-1000">

                            <form method="POST" action="{{asset('admin_panel/movie/edit/quote/delete/'.$quote->id)}}" class="mb-3 w-full text-right">
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
                            <form
                                method="POST"
                                action="{{asset('admin_panel/movie/edit/quote/update/'.$quote->id)}}"
                                class="quote_form p-6 transition duration-1000"
                                enctype="multipart/form-data"
                            >
                                @csrf
                                @method('PUT')

                                <h1 class="text-center font-bold text-xl">Add movie quote</h1>

                                <div class="mb-6 mt-6">

                                    <label for="quote_ge" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                        Movie quote in georgian
                                    </label>

                                    <input
                                        class="border border-gray-400 p-2 w-full"
                                        type="text"
                                        name="quote[ge]"
                                        id="quote_ge"
                                        value="{{$quote->getTranslation('quote', 'ge')}}"
                                        required
                                    >

                                    @error('quote.ge')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror

                                </div>

                                <div class="mb-6">

                                    <label for="quote_en" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                        Movie quote in english
                                    </label>

                                    <input
                                        class="border border-gray-400 p-2 w-full"
                                        type="text"
                                        name="quote[en]"
                                        id="quote_en"
                                        value="{{$quote->getTranslation('quote', 'en')}}"
                                        required
                                    >

                                    @error('quote.en')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror

                                </div>

                                <div class="mb-6">

                                    <label for="quote_img" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                        Quote image
                                    </label>

                                    <img src="{{asset('storage/'.$quote->quote_img)}}" alt="">

                                    <input
                                        class="border border-gray-400 p-2 w-full"
                                        type="file"
                                        name="quote_img"
                                        id="quote_img"
                                    >

                                    @error('quote_img')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror

                                </div>


                                <div class="mb-6 mt-6">
                                    <button class="w-full bg-blue-300 hover:bg-blue-500 py-3 rounded-xl transition duration-300">Edit quote</button>
                                </div>

                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
    </section>

</x-admin.layout>
