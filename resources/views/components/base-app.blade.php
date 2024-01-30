<!DOCTYPE html>
<html>
    <head>
        <!--
            meta data untuk mendefinisikan character set dan tampilan web
            https://developer.mozilla.org/en-US/docs/Web/HTML/Element/meta
            https://developer.mozilla.org/en-US/docs/Web/HTML/Viewport_meta_tag
        -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? '' }}</title>
        <!--
            load css dan js untuk library yang kita butuhkan
            https://laravel.com/docs/10.x/vite#loading-your-scripts-and-styles
            https://laravel-livewire.com/docs/2.x/quickstart
        -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body>
        <main>
        <!--
            component slot, digunakan untuk me-render isi/content.
            Content akan kita definisikan di view yang di render oleh masing2
            controller handler
        -->
        {{ $slot }}
        </main>
        @livewireScripts
    </body>
</html>
