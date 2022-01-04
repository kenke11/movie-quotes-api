<form method="POST" action="{{route('movie.update', $movie->id)}}" enctype="multipart/form-data" class="h-full bg-gray-200 border-gray-500 p-6 rounded-xl w-1/2 mx-5">
    @csrf
    <h1 class="text-center font-bold text-xl mb-6">Edit movie quotes</h1>

    <x-admin.form-input
        id="name_ge"
        label="Movie name in georgian"
        type="text"
        name="name[ge]"
        value="{{$movie->getTranslation('name', 'ge')}}"
        error="name.ge"
    />

    <x-admin.form-input
        id="name_en"
        label="Movie name in english"
        type="text"
        name="name[en]"
        value="{{$movie->getTranslation('name', 'en')}}"
        error="name.en"
    />

    <x-admin.form-input
        id="img"
        label="Movie image"
        type="file"
        name="img"
        value=" "
        error="img"
    >
        <img src="{{asset('storage/'.$movie->img)}}" class="py-3" alt="">
    </x-admin.form-input>

    <x-admin.form-button
        type="submit"
        desc="Edit"
    />

</form>
