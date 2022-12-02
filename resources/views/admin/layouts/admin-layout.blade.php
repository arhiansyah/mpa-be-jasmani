<x-app-layout>
    <div id="app">

        <x-admin-sidebar></x-admin-sidebar>
        <div id="main">
            <x-admin-header></x-admin-header>
            {{ $slot }}


        </div>
    </div>
    <x-slot name="styleVendor">
        {{ isset($styleVendor) ? $styleVendor:' ' }}
    </x-slot>
    <x-slot name="style">
        {{ isset($style) ? $style:'' }}
    </x-slot>
    <x-slot name="scriptVendor">
        {{ isset($scriptVendor) ? $scriptVendor:'' }}
    </x-slot>
    <x-slot name="script">
        <script>
            /* Fungsi formatRupiah */
            /* Fungsi formatRupiah */
            function formatRupiah(angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, "").toString(),
                    split = number_string.split(","),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if (ribuan) {
                    separator = sisa ? "." : "";
                    rupiah += separator + ribuan.join(".");
                }

                rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
                return prefix == undefined ? rupiah : rupiah ? rupiah : "";
            }

        </script>
        {{ isset($script) ? $script:' ' }}
    </x-slot>
</x-app-layout>
