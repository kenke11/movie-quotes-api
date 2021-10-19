<x-admin.layout>

    <section class="px-5 py-5 ">
        <main class="max-w-lg mx-auto mt-10 bg-gray-200 border-gray-500 p-6 rounded-xl">
            <form method="POST" action="{{asset('admin_panel/movie')}}" enctype="multipart/form-data">
                @csrf

                <h1 class="text-center font-bold text-xl">Create movie quotes</h1>


                <div class="mb-6 mt-6">

                    <label for="title_ge" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Title in georgian
                    </label>

                    <input
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="title_ge"
                        id="title_ge"
                        value="{{old('title_ge')}}"
                        required
                    >

                    @error('title_ka')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">

                    <label for="title_en" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Title_en
                    </label>

                    <input
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="title_en"
                        id="title_en"
                        value="{{old('title_en')}}"
                        required
                    >

                    @error('title_en')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6 mt-6">

                    <label for="quotes_ge" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        quotes_ge
                    </label>

                    <input
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="quotes_ge"
                        id="quotes_ge"
                        value="{{old('quotes_ge')}}"
                        required
                    >

                    @error('quotes_ge')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6 mt-6">

                    <label for="quotes_en" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        quotes_en
                    </label>

                    <input
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="quotes_en"
                        id="quotes_en"
                        value="{{old('quotes_en')}}"
                        required
                    >

                    @error('quotes_en')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">

                    <label for="img" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Img
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
