/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php"
    ],
    theme: {
        extend: {
            fontFamily: {
                'circular-book': ['CircularStd-Book', 'sans-serif'],
                'circular-book-italic': ['CircularStd-BookItalic', 'sans-serif'],
                'circular-medium': ['CircularStd-Medium', 'sans-serif'],
                'circular-medium-italic': ['CircularStd-MediumItalic', 'sans-serif'],
                'circular-bold': ['CircularStd-Bold', 'sans-serif'],
                'circular-bold-italic': ['CircularStd-BoldItalic', 'sans-serif'],
                'circular-light': ['CircularStd-Light', 'sans-serif'],
                'circular-light-italic': ['CircularStd-LightItalic', 'sans-serif'],
                'circular-black': ['CircularStd-Black', 'sans-serif'],
                'circular-black-italic': ['CircularStd-BlackItalic', 'sans-serif'],
            },
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
}

