<x-layouts.app title="Dashboard">
    <div class="bg-white shadow-md rounded-md px-5 py-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-[17px]">Bienvenido <span class="text-blue-700 font-semibold">{{ Auth::user()->name }}</span></h1>
        </div>
    </div>
</x-layouts.app>
