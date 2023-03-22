<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tamu &raquo; Cetak
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div>
                <div class="flex flex-wrap -mx-3">
                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Tanggal
                            Awal</label>
                        <input name="start" id="start"
                            class="appearance-none block w-full lg:w-1/2 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            type="date">
                    </div>

                    <div class="w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Tanggal
                            Akhir</label>
                        <input name="end" id="end"
                            class="appearance-none block w-full lg:w-1/2 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            type="date">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <a href=""
                            onclick="this.href='cetaksesi/'+ document.getElementById('start').value + '/' + document.getElementById('end').value"
                            class="bg-teal-500 hover:bg-teal-800 text-white font-bold py-2 px-10 rounded-md shadow-lg">Cetak</a>

                        <a href="{{ route('dashboard.guest.index') }}"
                            class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-10 ml-3 rounded-md shadow-lg">
                            Batal
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>

</x-app-layout>
