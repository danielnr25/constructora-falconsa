<x-layouts.app title="Dashboard">
    @push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    @endpush
    <div class="bg-white shadow-md rounded-md px-5 py-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-semibold my-4">Registrar Servicios</h1>
            <div>
                <a href="{{ route('admin.services.index') }}" class="bg-gray-900 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-md">
                    Regresar
                </a>
            </div>
        </div>

        <div class="space-y-5">
            <div class="space-y-5">
                <label for="image" class="block text-sm font-semibold text-gray-800 tracking-wide">Imagen</label>
                <form id="dropzone" action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data" class="dropzone border-gray-800 border-2 w-full h-48 rounded flex flex-col justify-center items-center">
                    @csrf
                </form>
            </div>
            <form action="{{ route('admin.services.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-800 tracking-wide">Titulo</label>
                        <input type="text" name="title" id="title" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm rounded-md @error('title') border-red-500 @enderror" value="{{ old('title') }}">
                        @error('title')
                        <div class=" text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="subtitle" class="block text-sm font-semibold text-gray-800 tracking-wide">Subtitulo</label>
                        <input type="text" name="subtitle" id="subtitle" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm @error('title') border-red-500 @enderror rounded-md" value="{{ old('subtitle') }}">
                        @error('subtitle')
                        <div class=" text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="slug" class="block text-sm font-semibold text-gray-800 tracking-wide">Slug</label>
                        <input type="text" name="slug" id="slug" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm @error('slug') border-red-500 @enderror rounded-md" value="{{ old('slug') }}">
                        @error('slug')
                        <div class=" text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-800 tracking-wide">Descripción</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm @error('description') border-red-500 @enderror rounded-md">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <input type="hidden" value="{{ old('imagen') }}" name="imagen" id="imagen" />
                        @error('imagen')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="bg-blue-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
