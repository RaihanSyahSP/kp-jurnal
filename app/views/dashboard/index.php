<div class="container items-center px-4 py-8 m-auto mt-5">
    <div class="flex flex-wrap pb-3 mx-4 md:mx-24 lg:mx-0">
        <div class="w-full p-2 lg:w-1/4 md:w-1/2">
            <div class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                <div class="flex flex-row justify-between items-center">
                    <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-50" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="inline-flex text-sm text-gray-600 group-hover:text-gray-200 sm:text-base">
                        <button class="btn show-modal btn-ghost" id="show-detail">Detail</button>
                    </div>
                </div>
                <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">95</h1>
                <div class="flex flex-row justify-between group-hover:text-gray-200">
                    <p>Jumlah Buku Dosen</p>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 group-hover:text-gray-200" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>
            </div>
        </div>
        <div class="w-full p-2 lg:w-1/4 md:w-1/2">
            <div class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                <div class="flex flex-row justify-between items-center">
                    <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-50" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z" />
                        </svg>
                    </div>
                    <div class="inline-flex text-sm text-gray-600 group-hover:text-gray-200 sm:text-base">
                        <button class="btn show-modal btn-ghost" onclick="my_modal_2.showModal()">Detail</button>
                    </div>
                </div>
                <h1 id="totalCitationCount" class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50"></h1>
                <div class="flex flex-row justify-between group-hover:text-gray-200">
                    <p>Jumlah Sitasi Per Dosen</p>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 group-hover:text-gray-200" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>
            </div>
        </div>
        <div class="w-full p-2 lg:w-1/4 md:w-1/2">
            <div class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                <div class="flex flex-row justify-between items-center">
                    <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-50" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="inline-flex text-sm text-gray-600 group-hover:text-gray-200 sm:text-base">
                        <button class="btn show-modal btn-ghost">Detail</button>
                    </div>
                </div>
                <h1 class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50">76</h1>
                <div class="flex flex-row justify-between group-hover:text-gray-200">
                    <p>Jumlah Prosiding Scopus</p>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 group-hover:text-gray-200" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>
            </div>
        </div>
        <div class="w-full p-2 lg:w-1/4 md:w-1/2">
            <div class="flex flex-col px-6 py-10 overflow-hidden bg-white hover:bg-gradient-to-br hover:from-purple-400 hover:via-blue-400 hover:to-blue-500 rounded-xl shadow-lg duration-300 hover:shadow-2xl group">
                <div class="flex flex-row justify-between items-center">
                    <div class="px-4 py-4 bg-gray-300  rounded-xl bg-opacity-30">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-50" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </div>
                    <div class="inline-flex text-sm text-gray-600 group-hover:text-gray-200 sm:text-base">
                        </svg>
                        <button class="btn btn-ghost" onclick="my_modal_3.showModal()">Detail</button>
                    </div>
                </div>
                <h1 id="totalInternationalJournal" class="text-3xl sm:text-4xl xl:text-5xl font-bold text-gray-700 mt-12 group-hover:text-gray-50"></h1>
                <div class="flex flex-row justify-between group-hover:text-gray-200">
                    <p>Jumlah Publikasi Internasional</p>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 group-hover:text-gray-200" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- modal jumlah sitasi per dosen -->
<dialog id="my_modal_2" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <h3 class="font-bold text-lg">Detail Jumlah Data Sitasi Google Scholar</h3>
        <!-- datatable -->
        <div class="px-5 mt-5 overflow-x" style="max-width: 100vw; overflow-x: auto;">
            <table id="tabelSitasi" class="display" style="width: 100%;">
                <thead>
                    <tr class="text-xl md:text-base">
                        <th>No</th>
                        <th>Judul</th>
                        <th>Nama Dosen</th>
                        <th>Jumlah Sitasi</th>
                    </tr>
                </thead>

                <tbody>
                    <script>
                        $(document).ready(function() {

                            // Declare table variable outside the DataTable initialization
                            var table;

                            table = $('#tabelSitasi').DataTable({
                                "dom": 'lfBrtip',
                                "responsive": {
                                    details: {
                                        renderer: function(api, rowIdx, columns) {
                                            var data = $.map(columns, function(col, i) {
                                                return col.hidden ?
                                                    '<tr data-dt-row="' + col.rowIndex + '" data-dt-column="' + col.columnIndex + '">' +
                                                    '<td>' + col.title + ':' + '</td> ' +
                                                    '<td' + (col.title === 'Edit' ? ' class="td-buttons"' : '') + '>' + col.data + '</td>' +
                                                    '</tr>' :
                                                    '';
                                            }).join('');

                                            return data ?
                                                $('<table/>').append(data) :
                                                false;
                                        }
                                    }
                                },
                                "fixedHeader": true,
                                "buttons": [{
                                    "extend": 'excel',
                                    "text": '<button class="btn btn-outline  my-5">Download Excel</button>',
                                    "titleAttr": 'Excel',
                                    "action": newexportaction
                                }, ],
                                "processing": true,
                                "serverSide": true,
                                "pageLength": 10,
                                "lengthMenu": [10, 25, 50, 75, 100],
                                "ajax": {
                                    "url": "/dashboard/getCitedCountGscholar",
                                    "type": "post",
                                    "datatype": "json"
                                },
                                columns: [{
                                        data: "id",
                                        class: 'responsive'
                                    },
                                    {
                                        data: "title",
                                        class: 'responsive'
                                    },
                                    {
                                        data: "fullname",
                                        class: 'responsive'
                                    },
                                    {
                                        data: "citation",
                                        class: 'responsive'
                                    },
                                ]
                            });

                        });
                    </script>
                </tbody>
            </table>
        </div>
        <!-- end datatable -->
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<!-- modal jumlah jurnal internasional dosen -->
<dialog id="my_modal_3" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <h3 class="font-bold text-lg">Detail Jumlah Publikasi Internasional (Wos & Scopus)</h3>
        <!-- datatable -->
        <div class="px-5 mt-5 overflow-x" style="max-width: 100vw; overflow-x: auto;">
            <table id="tabelPublikasiInter" class="display" style="width: 100%;">
                <thead>
                    <tr class="text-xl md:text-base">
                        <th>No</th>
                        <th>Nama Dosen</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>

                <tbody>
                    <script>
                        $(document).ready(function() {

                            // Declare table variable outside the DataTable initialization
                            var table;

                            table = $('#tabelPublikasiInter').DataTable({
                                "dom": 'lfBrtip',
                                "responsive": {
                                    details: {
                                        renderer: function(api, rowIdx, columns) {
                                            var data = $.map(columns, function(col, i) {
                                                return col.hidden ?
                                                    '<tr data-dt-row="' + col.rowIndex + '" data-dt-column="' + col.columnIndex + '">' +
                                                    '<td>' + col.title + ':' + '</td> ' +
                                                    '<td' + (col.title === 'Edit' ? ' class="td-buttons"' : '') + '>' + col.data + '</td>' +
                                                    '</tr>' :
                                                    '';
                                            }).join('');

                                            return data ?
                                                $('<table/>').append(data) :
                                                false;
                                        }
                                    }
                                },
                                "fixedHeader": true,
                                "buttons": [{
                                    "extend": 'excel',
                                    "text": '<button class="btn btn-outline  my-5">Download Excel</button>',
                                    "titleAttr": 'Excel',
                                    "action": newexportaction
                                }, ],
                                "processing": true,
                                "serverSide": true,
                                "pageLength": 10,
                                "lengthMenu": [10, 25, 50, 75, 100],
                                "ajax": {
                                    "url": "/dashboard/getCountInternationalJournal",
                                    "type": "post",
                                    "datatype": "json"
                                },
                                columns: [{
                                        data: "id",
                                        class: 'responsive'
                                    },
                                    {
                                        data: "dosen_name",
                                        class: 'responsive'
                                    },
                                    {
                                        data: "total_publikasi_internasional",
                                        class: 'responsive'
                                    },
                                ]
                            });

                        });
                    </script>
                </tbody>
            </table>
        </div>
        <!-- end datatable -->
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>

<script src="<?= BASEURL; ?>/js/exportExcel.js"></script>

<script>
    $(document).ready(function() {
        const loadingSpinnerClass = 'loading loading-spinner loading-lg'
        
        // Ajax call to get total citation count
        $('#totalCitationCount').addClass(loadingSpinnerClass);
        $.ajax({
            url: 'dashboard/getTotalCitedCountGscholar',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                // Update the content of the h1 element with the fetched data
                $('#totalCitationCount').text(response);
                $('#totalCitationCount').removeClass(loadingSpinnerClass);
            },
            error: function(error) {
                console.error('Error fetching data:', error);
                $('#totalCitationCount').addClass(loadingSpinnerClass);
            }
        });

        // Ajax call to get total international journal count
        $('#totalInternationalJournal').addClass(loadingSpinnerClass);
        $.ajax({
            url: 'dashboard/getTotalInternationalPublication',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                // Update the content of the h1 element with the fetched data
                $('#totalInternationalJournal').text(response);
                $('#totalInternationalJournal').removeClass(loadingSpinnerClass);
            },
            error: function(error) {
                console.error('Error fetching data:', error);
                $('#totalInternationalJournal').addClass(loadingSpinnerClass);
            }
        });
    });
</script>