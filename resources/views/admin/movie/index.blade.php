<x-admin.layout>

    <section class="mx-5 my-5">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($movies as $movie)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <span>{{$movie->id}}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">

                                            <div class="text-sm text-gray-500">
                                                {{$movie->title_ge}}
                                            </div>

                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">

                                            <div class="text-sm text-gray-500">
                                                {{$movie->title_en}}
                                            </div>

                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <form method="POST" action="{{asset('admin_panel/movie/delete/'.$movie->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 hover:text-red-900">delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <!-- More people... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-admin.layout>
