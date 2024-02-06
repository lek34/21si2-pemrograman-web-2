<!--
    NOTE: attribute x-* merupakan attribute tambahan dari alpineJS
    kita mengintegrasikan tombol delete yang apabila di-click akan menampilkan component
    modal untuk menanyakan konfirmasi user apakah barang benar akan dihapus

    https://alpinejs.dev/
    https://livewire.laravel.com/docs/alpine

    check:
    - /resources/views/components/danger-button.blade.php untuk definisi tombol danger
    - /resources/views/components/modal.blade.php untuk definisi component modal
-->
<x-danger-button
    x-data=""
    x-on:click.prevent="$dispatch('open-modal', 'confirm-barang-deletion-{{$barang->id}}')">
    Delete
</x-danger-button>

<x-modal name="confirm-barang-deletion-{{$barang->id}}" :show="$errors->isNotEmpty()" focusable>
    <form method="get" action="{{$action}}" class="p-6">
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Yakin menghapus barang {{ $barang->nama }}?
        </h2>
        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close-modal', 'confirm-barang-deletion-{{$barang->id}}')">Batal</x-secondary-button>
            <x-danger-button class="ms-3">Delete</x-danger-button>
        </div>
    </form>
</x-modal>
