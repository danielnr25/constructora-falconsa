<x-layouts.app title="Dashboard">
    @push('scripts')
    <script>
        // Ocultar la notificación después de 3000 milisegundos (3 segundos)
        setTimeout(function() {
            document.getElementById('notificacion').style.display = 'none';
        }, 2500);
    </script>
    @endpush
    <div class="bg-white shadow-md rounded-md px-5 py-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-semibold my-4">Listado de posts</h1>
            <div>
                <a href="{{ route('admin.posts.create') }}" class="bg-gray-900 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-md">
                    Crear posts
                </a>
            </div>
        </div>

        <!-- creado correctamente -->
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert" id="notificacion">
            <strong class="font-bold">Bien hecho!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif
        <div class="py-5">
            @if ($posts->count() > 0)
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-100 uppercase bg-blue-800">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Titulo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Imagen
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Estado
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr class="bg-white border-b text-gray-900">
                            <td class="px-6 py-4">
                                {{ $post->id }}
                            </td>
                            <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <span style="display: inline-block;
                                    width: 180px;
                                    white-space: nowrap;
                                    overflow: hidden !important;
                                    text-overflow: ellipsis;"> {{ $post->title }}
                                </span>
                            </th>
                            <td class="px-6 py-4">
                                <img class="h-auto object-cover max-w-[60px]" src="/uploads/{{$post->imagen }}" alt="image-none">
                            </td>

                            <td class="px-6 py-4">
                                @if ($post->status == "ACTIVE")
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-md bg-green-300 text-green-800">
                                    Activo
                                </span>
                                @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-md bg-red-300 text-red-800">
                                    Inactivo
                                </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-3 items-center">
                                    <a href="{{ route('admin.posts.edit', $post->id ) }}" class="font-medium bg-emerald-700 px-2 py-1 rounded-md text-white hover:bg-green-500">Editar</a>
                                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-medium bg-red-700 px-2 py-1 rounded-md text-white hover:bg-red-500">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $posts->links() }}
            </div>
            @else
            <div class="px-10 py-8 space-y-4">
                <h1 class="text-xl text-blue-800 md:text-2xl font-circular-medium mb-2 tracking-wide leading-7">No hay posts disponibles</h1>
            </div>
            @endif
        </div>
    </div>
</x-layouts.app>
