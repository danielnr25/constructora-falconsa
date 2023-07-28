<x-layouts.guest title="Nuestras Obras">

    <div class="flex items-center justify-center">
        <div class="relative w-screen">
            <img src="{{asset('dist/img/service.jpeg')}}" alt="Nuestras Obras" class="w-full h-72 object-cover shadow-lg" />
            <div class="absolute bottom-0 left-0 right-0 h-full p-4 md:p-0 md:pl-10 bg-gray-800 bg-opacity-75 text-white">
                <h2 class="text-2xl mt-20 md:text-5xl font-circular-medium mb-2 tracking-wide leading-7 max-w-4xl">{{ $job->title }}</h2>
                <p class="mb-4 max-w-2xl text-lg leading-8 text-gray-100 ">
                    {{ $job->subtitle }}
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl items-center mx-auto bg-lights-sun">
        <div class="md:grid md:grid-cols-2 gap-10 md:py-10 md:px-5 py-10 px-4 space-y-5">
            <div class="mt-6">
                <img src="/uploads/{{$job->imagen }}" alt="image-name" class="rounded-xl w-[518px] object-cover" />
            </div>

            <div class="bg-white rounded-lg shadow-lg">
                <div class="px-10 py-8 space-y-4">
                    <h1 class="text-xl md:text-2xl font-circular-medium mb-2 tracking-wide leading-7">{{ $job->title }}</h1>
                    <p class="text-base font-circular-light text-gray-700">
                        <span class="text-blue-700 font-circular-medium">Lugar: </span> {{ $job->location }}
                    </p>
                    <p class="text-base font-circular-light text-gray-700">
                    <span class="text-blue-700 font-circular-medium">Cliente - Empresa: </span> {{ $job->client }}
                    </p>
                    <p class="text-base font-circular-light text-gray-700">
                    <span class="text-blue-700 font-circular-medium">Año de entrega: </span> {{ $job->year }}
                    </p>
                    <p class="text-[16px] leading-7 font-circular-light text-gray-700 text-justify">
                    <span class="text-blue-700 font-circular-medium">Detalles: </span> {{ $job->description }}
                    </p>
                    <div class="flex items-center space-x-4 pt-6">
                        <button class="bg-red-700 px-3 py-1 rounded-md text-white">
                            Correo
                        </button>
                        <span class="text-base font-circular-light text-black">
                            falconsa.constructor@gmail.com
                        </span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button class="bg-blue-700 px-3 py-1 rounded-md text-white">
                            Contactar
                        </button>
                        <span class="text-base font-circular-light text-black">
                            +51 918 184 467
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </div>



</x-layouts.guest>
