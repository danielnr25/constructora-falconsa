<div class="lg:py-10 space-y-12">
    <h1 class="text-center text-black font-circular-medium tracking-wider md:text-3xl text-2xl my-5">
        Nuestros blog de noticias
    </h1>
    <div class="flex justify-between lg:px-10 px-4 items-center">
        <h1 class="text-black text-xl font-circular-medium md:text-2xl">
            Publicaciones Recientes
        </h1>
        <button class="underline py-1.5 px-3 md:py-2 md:px-3 font-semibold text-black rounded-lg  hover:text-blue-700">
            Ver más
        </button>
    </div>
</div>

<div class="lg:py-10 space-y-12 flex justify-center py-10 px-10">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        @if ($posts->count())
        @foreach ($posts as $post)
        <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 ease-in-out">
            <img src="/uploads/{{$post->imagen }}" alt="image-name" class="rounded-t-lg object-cover cursor-grabbing w-full h-60" />
            <div class="p-6">
                <h2 class="text-xl font-circular-medium tracking-wide text-blue-900 md:text-2xl lg:text-start text-center">{{ $post->title }}</h2>
                <p class="mt-2 leading-6 text-gray-800 text-justify">{{ $post->excerpt }}</p>
                <div class="flex justify-between items-center mt-4">
                    <a href="{{ route('posts.show', $post->slug) }}" class="underline py-1.5 px-3 md:py-2 md:px-3 font-semibold text-black rounded-lg  hover:text-blue-700">
                        Leer más
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="py-10 px-10">
        <div>
            {{ $posts->links() }}
        </div>
    </div>
    @else
    <div class="col-span-1 md:col-span-2 lg:col-span-3">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="px-10 py-8 space-y-4">
                <h1 class="text-xl text-blue-800 md:text-2xl font-circular-medium mb-2 tracking-wide leading-7">No hay posts disponibles</h1>
            </div>
        </div>
    </div>
    @endif
</div>
