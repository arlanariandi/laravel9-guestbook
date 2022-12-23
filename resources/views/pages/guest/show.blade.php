<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Tamu &raquo; #{{ $guest->id }} {{ $guest->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('dashboard.guest.index') }}"
                    class="bg-indigo-500 hover:bg-indigo-800 text-white font-bold py-2 px-4 rounded-md shadow-lg">
                    Kembali
                </a>
            </div>

            <div class="overflow-hidden rounded-lg mb-10">
                <div class="p6 bg-white shadow w-full lg:w-1/2">
                    <table class="table-auto w-full">
                        <tbody>
                            <tr>
                                <th class="border px-6 py-4 text-right">NAMA</th>
                                <td class="border px-6 py-4">
                                    {{ $guest->name }}
                                </td>
                            </tr>

                            <tr>
                                <th class="border px-6 py-4 text-right">JENIS KELAMIN</th>
                                <td class="border px-6 py-4">
                                    {{ $guest->gender }}
                                </td>
                            </tr>

                            <tr>
                                <th class="border px-6 py-4 text-right">ALAMAT</th>
                                <td class="border px-6 py-4">
                                    {{ $guest->address }}
                                </td>
                            </tr>

                            <tr>
                                <th class="border px-6 py-4 text-right">TUJUAN</th>
                                <td class="border px-6 py-4">
                                    {{ $guest->description }}
                                </td>
                            </tr>

                            <tr>
                                <th class="border px-6 py-4 text-right">NO HP</th>
                                <td class="border px-6 py-4">
                                    {{ $guest->phone }}
                                </td>
                            </tr>

                            <tr>
                                <th class="border px-6 py-4 text-right">DATANG</th>
                                <td class="border px-6 py-4">
                                    {{ $guest->created_at->format('d M Y - H:i') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
