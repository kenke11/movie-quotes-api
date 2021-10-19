<x-admin.layout>

    <section class="px-5 py-5 ">
        <main class="max-w-lg mx-auto mt-10 bg-gray-200 border-gray-500 p-6 rounded-xl">
            <form action="">


                <h1 class="text-center font-bold text-xl">Create movie quotes</h1>


                <div class="mb-6 mt-6">

                    <label for="title_ka" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Title_ka
                    </label>

                    <input
                        class="border border-gray-400 p-2 w-full"
                        type="text"
                        name="title_ka"
                        id="title_ka"
                        value="{{old('title_ka')}}"
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
                        type="email"
                        name="title_en"
                        id="title_en"
                        value="{{old('title_en')}}"
                        required
                    >

                    @error('title_en')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

            </form>
        </main>
    </section>

</x-admin.layout>
