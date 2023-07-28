<div class="lg:py-10 space-y-12 flex justify-center py-10 px-10">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
        @if ($jobs->count())
        @foreach ($jobs as $job)
        <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 ease-in-out">
            <img src="/uploads/{{$job->imagen }}" alt="image-name" class="rounded-t-lg object-cover cursor-grabbing w-full h-60" />
            <div class="p-6">
                <h2 class="text-xl font-circular-medium tracking-wide text-blue-900 md:text-2xl lg:text-start text-center">{{ $job->title }}</h2>
                <p class="mt-2 leading-6 text-gray-800 text-justify">{{ $job->subtitle }}</p>
                <div class="flex justify-between items-center mt-4">
                    <a href="{{ route('jobs.show', $job->slug)}}" class="text-blue-900 hover:underline">Leer más</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="py-10 px-10">
        <div>
            {{ $jobs->links() }}
        </div>
    </div>
    @else
    <div class="col-span-1 md:col-span-2 lg:col-span-3">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="px-10 py-8 space-y-4">
                <h1 class="text-xl text-blue-800 md:text-2xl font-circular-medium mb-2 tracking-wide leading-7">No hay servicios disponibles</h1>
            </div>
        </div>
    </div>
    @endif
</div>
