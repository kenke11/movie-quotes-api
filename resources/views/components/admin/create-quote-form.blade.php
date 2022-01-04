<form
    method="POST"
    action="{{route('quote.store', $movie->id)}}"
    class="quote_form hidden opacity-0 bg-green-200 border border-green-500 p-6 rounded-xl  my-5 transition duration-1000"
    enctype="multipart/form-data"
>
    @csrf

    <h1 class="text-center font-bold text-xl mb-6">Add movie quote</h1>

    <x-admin.form-textarea
        id="quote_ge"
        label="Movie quote in georgian"
        name="quote[ge]"
        error="quote.ge"
        value=""
    />

    <x-admin.form-textarea
        id="quote_en"
        label="Movie quote in english"
        name="quote[en]"
        error="quote.en"
        value=""
    />

    <x-admin.form-input
        id="quote_img"
        label="Quote image"
        type="file"
        name="quote_img"
        value=""
        error="quote_img"
    />

    <x-admin.form-button
        type="submit"
        desc="Add quote"
    />

</form>
