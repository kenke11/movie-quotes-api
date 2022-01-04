<x-admin.layout>
    <section class="px-5 py-5 ">
        <div class=" ml-10 mt-10 lg:flex">
            <x-admin.edit-movie-form :movie="$movie"/>

            <div class="w-1/2">
                <button
                    class="add_new_quote_btn m-auto w-full rounded-xl bg-green-300 py-5 text-center border border-green-500 hover:bg-green-500 transition font-bold"
                >
                    Add new quote
                </button>

                <x-admin.create-quote-form :movie="$movie"/>


                @foreach($quotes as $quote)
                    <x-admin.quote :quote="$quote"/>
                @endforeach
            </div>
        </div>
    </section>

</x-admin.layout>
