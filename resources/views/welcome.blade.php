<x-layout>
    @if($movie->count() <= 0)
        <x-dont-have-movie />
    @else
        <x-movie :movie="$movie" :quote="$quote"/>
    @endif
</x-layout>
