<nav class="bg-white border-gray-200 shadow-md">
    <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-2 px-10">
        <a href="{{ url('/') }}" class="flex items-center gap-3 justify-center">
            <img src="{{asset('dist/img/Logo.webp')}}" class="h-[70px]" alt="logo falconsa" />
            <span class="self-center text-2xl font-bold text-blue-900 whitespace-nowrap tracking-wide dark:text-white">FALCONSA</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="flex flex-col font-semibold p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ route('empresa') }}" class="block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 text-[17px] {{ request()->routeIs('empresa') ? 'text-blue-700' : 'text-gray-900' }}">La empresa</a>
                </li>
                <li>
                    <a href="{{ route('servicios') }}" class="block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 text-[17px] {{ request()->routeIs('servicios') ? 'text-blue-700' : 'text-gray-900' }}">Servicios</a>
                </li>
                <li>
                    <a href="{{ route('obras') }}" class="block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 text-[17px] {{ request()->routeIs('obras') ? 'text-blue-700' : 'text-gray-900' }}">Nuestras Obras</a>
                </li>
                <li>
                    <a href="{{route('blog') }}" class="block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 text-[17px] {{ request()->routeIs('blog') ? 'text-blue-700' : 'text-gray-900' }}">Blog</a>
                </li>
                <li>
                    <a href="{{ route('contacto') }}" class="block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 text-[17px] {{ request()->routeIs('contacto') ? 'text-blue-700' : 'text-gray-900' }}">Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
