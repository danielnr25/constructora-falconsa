<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $metaDescription ?? 'Líder en el sector de la construcción civil en la región norte del Perú.' }}">
    <title>Falconsa - {{ $title ?? '' }}</title>
    <link rel="icon" href="{{ asset('dist/img/Logo.webp') }}" type="image/webp">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>


    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/fonts.css'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <x-layouts.navigations.navbar />
    <div class="bg-slate-100">
        {{ $slot }}
    </div>
    <x-layouts.navigations.footer />
</body>

</html>
