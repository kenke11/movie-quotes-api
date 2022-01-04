<div class="mb-6">

    <label for="{{$id}}" class="block mb-2 uppercase font-bold text-xs text-gray-700">
        {{$label}}
    </label>

    <textarea
        class="border border-gray-400 p-2 w-full"
        name="{{$name}}"
        id="{{$id}}"
        required
    >{{$value}}</textarea>

    @error($error)
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
    @enderror

</div>
