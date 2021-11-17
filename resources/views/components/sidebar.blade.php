<aside class="w-max flex flex-col pt-10 px-10">
    <ul>
        <li class="mt-3">
            <a href="{{route('admin.index')}}" class="pt-3 text-2xl {{request()->is('admin_panel') ? 'text-blue-500' : ''}}">movies</a>
        </li>
        <li class="mt-3">
            <a href="{{route('movie.create')}}" class="pt-3 text-2xl  {{request()->is('admin_panel/movie/create') ? 'text-blue-500' : ''}}">create</a>
        </li>
    </ul>
</aside>
