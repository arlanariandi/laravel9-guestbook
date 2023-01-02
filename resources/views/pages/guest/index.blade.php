<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tamu') }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>

        <script>
            // AJAX DataTable
            var datatable = $('#crudTable').DataTable({
                // responsive
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,

                // buttom
                dom: 'Blfrtip',
                buttons: [
                    'excel', 'pdf', 'print'
                ],

                // serverSide
                processing: true,
                serverSide: true,

                ajax: {
                    url: '{!! url()->current() !!}'
                },

                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        width: '5%'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '15%'
                    }
                ]
            })
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-10">
                <a href="{{ route('dashboard.guest.create') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mr-4 rounded-md shadow-lg">
                    + Tambah Tamu
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <table id="crudTable" class="display nowrap" style="width: 100%">
                        <thead class="text-left">
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Tujuan</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
