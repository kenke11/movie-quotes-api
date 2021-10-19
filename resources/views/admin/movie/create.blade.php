<x-admin.layout>

    <section class="px-5 py-5 ">
        <main class="max-w-lg mx-auto mt-10 bg-gray-200 border-gray-500 p-6 rounded-xl">
            <form method="POST" action="{{asset('admin_panel/movie')}}" enctype="multipart/form-data">
                @csrf

                <h1 class="text-center font-bold text-xl">Create movie quotes</h1>


                <div class="mb-6 mt-6">

                    <label for="name_ge" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Movie name in georgian
                    </label>

                    <input
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="name_ge"
                        id="name_ge"
                        value="{{old('name_ge')}}"
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
                        value="{{old('name_en')}}"
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
                        value="{{old('quote_ge')}}"
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
                        value="{{old('quote_en')}}"
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
        </main>
    </section>

</x-admin.layout>
