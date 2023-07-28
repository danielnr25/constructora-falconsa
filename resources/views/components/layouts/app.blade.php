<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Falconsa - {{ $title ?? '' }} </title>
    <meta name="description" content="{{ $metaDescription ?? 'Líder en el sector de la construcción civil en la región norte del Perú.' }}">
    <link rel="icon" href="{{ asset('dist/img/Logo.webp') }}" type="image/webp">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
    <!-- css -->
    @stack('styles')
    <!-- js -->
    @stack('scripts')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans text-gray-900 antialiased">

    <div class="min-h-screen bg-gray-100">
            @include('components.utils.navbar')

        <div class="flex space-x-4">
            <!-- Page Heading -->
            @include('components.utils.sidebar')

            <!-- Page Content -->
            <main class="flex-1">
                <div class="max-w-7xl mx-auto py-6 px-4">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

</body>

</html>
