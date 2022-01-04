<form
    method="POST"
    action="{{route('quote.update', $quote->id)}}"
    class="quote_form p-6 transition duration-1000"
    enctype="multipart/form-data"
>
    @csrf
    @method('PUT')

    <h1 class="text-center font-bold text-xl mb-6">Add movie quote</h1>

    <x-admin.form-textarea
        id="quote_ge"
        label="Movie quote in georgian"
        name="quote[ge]"
        value="{{$quote->getTranslation('quote', 'ge')}}"
        error="quote.ge"
    />

    <x-admin.form-textarea
        id="quote_en"
        label="Movie quote in english"
        name="quote[en]"
        value="{{$quote->getTranslation('quote', 'en')}}"
        error="quote.en"
    />

    <x-admin.form-input
        id="quote_img"
        label="Quote image"
        type="file"
        name="quote_img"
        value=""
        error="quote_img"
    >
        <img src="{{asset('storage/'.$quote->quote_img)}}" alt="">
    </x-admin.form-input>

    <x-admin.form-button
        type="submit"
        desc="Edit quote"
    />

</form>
