<x-layouts.guest title="Login">

    <div class="py-10">
        <div class="flex rounded-lg shadow-lg overflow-hidden mx-auto max-w-sm lg:max-w-4xl border border-primary border-opacity-30 bg-slate-100 bg-opacity-40">
            <div class="hidden lg:block lg:w-1/2 bg-cover bg-imgage-login"></div>
            <div class="w-full p-8 lg:w-1/2">
                <h1 class="uppercase cursor-pointer text-center text-3xl text-blue-800 font-bold">Falconsa</h1>
                <form class="space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                        @if(session('mesagge'))
                        <p class="text-white bg-red-500 py-2 my-2 rounded-lg text-sm text-center">{{ session('mesagge') }}</p>
                        @endif
                    <div class="mt-4">
                        <x-utils.input-label for="email" :value="__('Email')" />
                        <div class="mt-2">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                        <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                        <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                                    </svg>
                                </div>
                                <x-utils.text-input id="email" name="email" type="email" :value="old('email')" autofocus />
                            </div>
                            <x-utils.input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>
                    <div class="mt-4">
                        <x-utils.input-label for="password" :value="__('Contraseña')" />
                        <div class="mt-2">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor" height="1em" viewBox="0 0 448 512">
                                        <path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z" />
                                    </svg>
                                </div>

                                <x-utils.text-input id="password" name="password" type="password" />
                            </div>
                            <x-utils.input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    </div>
                    <x-utils.primary-button>
                        {{ __('Ingresar') }}
                    </x-utils.primary-button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.guest>
