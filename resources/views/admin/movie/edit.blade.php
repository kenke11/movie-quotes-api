<x-admin.layout>

    <section class="px-5 py-5 ">
        <main class=" ml-10 mt-10 lg:flex">
            <form method="POST" action="" enctype="multipart/form-data" class="bg-gray-200 border-gray-500 p-6 rounded-xl w-1/2 mx-5">
                @csrf

                <h1 class="text-center font-bold text-xl">Edit movie quotes</h1>


                <div class="mb-6 mt-6">

                    <label for="name_ge" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Movie name in georgian
                    </label>

                    <input
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="name_ge"
                        id="name_ge"
                        value="{{$movie->name_ge}}"
                        required
                    >

                    @error('name_ge')
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
                        name="name_en"
                        id="name_en"
                        value="{{$movie->name_en}}"
                        required
                    >

                    @error('name_en')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6 mt-6">

                    <label for="quote_ge" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Quote in georgia
                    </label>

                    <input
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="quote_ge"
                        id="quote_ge"
                        value="{{$movie->quote_ge}}"
                        required
                    >

                    @error('quote_ge')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6 mt-6">

                    <label for="quote_en" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Quote in english
                    </label>

                    <input
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="quote_en"
                        id="quote_en"
                        value="{{$movie->quote_en}}"
                        required
                    >

                    @error('quote_en')
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
                        required
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
                    class="m-auto w-full rounded-xl bg-green-300 py-5 text-center border border-green-500 hover:bg-green-500 transition font-bold"
                >
                    Add new quote
                </button>

                <form action="" class="bg-gray-200 border-gray-500 p-6 rounded-xl my-5 transition duration-1000" style="opacity: 1">

                    <h1 class="text-center font-bold text-xl">Add movie quote</h1>

                    <div class="mb-6 mt-6">

                        <label for="quote_ge" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Movie quote in georgian
                        </label>

                        <input
                            class="border border-gray-400 p-2 w-full"
                            type="text"
                            name="quote_ge"
                            id="quote_ge"
                            value="{{$movie->quote_ge}}"
                            required
                        >

                        @error('name_ge')
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
                            name="quote_en"
                            id="quote_en"
                            value="{{$movie->quote_en}}"
                            required
                        >

                        @error('quote_en')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror

                    </div>

                    <div class="mb-6 mt-6">
                        <button class="w-full bg-blue-300 hover:bg-blue-500 py-3 rounded-xl transition duration-300">Add quote</button>
                    </div>

                </form>


                <div class="w-full bg-gray-200 border-gray-500 p-6 rounded-xl my-5 transition duration-1000">

                    <form action="" class="mb-3 w-full text-right">
                        <button class="font-bold text-red-500">X</button>
                    </form>

                    <h3 class="block mb-2 uppercase font-bold text-lx text-gray-700 mt-3">MOVIE QUOTE IN GEORGIAN</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, ex.</p>

                    <h3 class="block mb-2 uppercase font-bold text-lx text-gray-700 mt-5">MOVIE quote IN ENGLISH</h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, sed!</p>
                </div>


            </div>

        </main>
    </section>

</x-admin.layout>
