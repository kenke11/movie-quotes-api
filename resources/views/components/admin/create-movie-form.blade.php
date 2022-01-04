<form method="POST" action="{{route('movie.store')}}" enctype="multipart/form-data">
    @csrf

    <h1 class="text-center font-bold text-xl mb-6">Create movie quotes</h1>

    <x-admin.form-input
        id="name_ge"
        label="Movie name in georgian"
        type="text"
        name="name[ge]"
        value=""
        error="name.ge"
    />

    <x-admin.form-input
        id="name_en"
        label="Movie name in english"
        type="text"
        name="name[en]"
        value=""
        error="name.en"
    />

    <x-admin.form-input
        id="img"
        label="Movie image"
        type="file"
        name="img"
        value=""
        error="img"
    />

    <x-admin.form-button
        type="submit"
        desc="Add movie"
    />


</form>
