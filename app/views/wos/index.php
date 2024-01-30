 <!-- Page content here -->
 <div class="px-5 mt-5 overflow-x" style="max-width: 100vw; overflow-x: auto;">
     <table id="myTable" class="display" style="width: 100%;">
         <thead>
             <tr class="text-xl md:text-base">
                 <th>No</th>
                 <th>Judul</th>
                 <th>Nama Jurnal</th>
                 <th>Penulis Pertama</th>
                 <th>Penulis Akhir</th>
                 <th>Penulis</th>
                 <th>Tanggal Terbit</th>
                 <th>Sitasi</th>
                 <th>Tipe Terbit</th>
                 <th>Tahun Terbit</th>
                 <th>ISSN</th>
                 <th>EISSN</th>
                 <th>DOI</th>
                 <th>Url</th>
             </tr>
         </thead>

         <tbody>


         </tbody>
     </table>
 </div>

 <div id="showAbstract" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 z-50 justify-center items-center">
     <div class="modal-container bg-white w-96 p-4 rounded-lg shadow-lg">
         <div class="flex justify-end">
             <button id="closeModal" class="text-gray-600 hover:text-gray-800">&times;</button>
         </div>
         <h1 class="text-lg font-bold mb-4">Abstract</h1>
         <p id="abstractContent"></p>
     </div>
 </div>


 <script>
     $(document).ready(function() {
         // function for export all data excel with server side processing
         function newexportaction(e, dt, button, config) {
             var self = this;

             // Save the original button content
             var originalContent = button.html();

             // Start the processing indicator
             button.html('<span class="absolute left-40 loading loading-dots loading-lg"></span>');

             var oldStart = dt.settings()[0]._iDisplayStart;
             dt.one('preXhr', function(e, s, data) {
                 // Just this once, load all data from the server...
                 data.start = 0;
                 data.length = 2147483647;
                 dt.one('preDraw', function(e, settings) {
                     // Call the original action function
                     if (button[0].className.indexOf('buttons-excel') >= 0) {
                         $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                             $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                             $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                     }
                     dt.one('preXhr', function(e, s, data) {
                         // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                         // Set the property to what it was before exporting.
                         settings._iDisplayStart = oldStart;
                         data.start = oldStart;
                     });

                     // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                     setTimeout(function() {
                         // Reset the button content to its original state
                         button.html(originalContent);
                         dt.ajax.reload();
                     }, 0);

                     // Prevent rendering of the full data to the DOM
                     return false;
                 });
             });
             // Requery the server with the new one-time export settings
             dt.ajax.reload(function() {
                 // Stop the processing indicator
                 dt.buttons().processing(false);
             });
         }

         // Declare table variable outside the DataTable initialization
         var table;

         table = $('#myTable').DataTable({
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
                 "text": '<button class="btn btn-outline">Download Excel</button>',
                 "titleAttr": 'Excel',
                 "action": newexportaction
             }, ],
             "processing": true,
             "serverSide": true,
             "pageLength": 10,
             "lengthMenu": [10, 25, 50, 75, 100],
             "ajax": {
                 "url": "/wos/getDataTableWos",
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
                     data: "journal_name",
                     class: 'responsive'
                 },
                 {
                     data: "authors",
                     render: function(data, type, row) {
                         var authors = data.split('; ');
                         var firstAuthor = authors[0] ? authors[0] : '';
                         return firstAuthor;
                     },
                     class: 'responsive'
                 },
                 {
                     data: "authors",
                     render: function(data, type, row) {
                         var authors = data.split('; ');
                         var lastAuthor = authors.length > 0 ? authors[authors.length - 1] : ''
                         return lastAuthor;
                     },
                     class: 'responsive'
                 },
                 {
                     data: "authors",
                     class: 'responsive'
                 },
                 {
                     data: "publish_date",
                     class: 'responsive'
                 },
                 {
                     data: "citation",
                     class: 'responsive'
                 },
                 //  {
                 //      data: "abstract",
                 //      class: 'responsive',
                 //      //  render: DataTable.render.ellipsis(10)
                 //      render: function(data, type, row) {
                 //          // Tautan untuk membuka modal atau popover
                 //          return '<button class="btn btn-show" data-bs-toggle="modal" data-bs-target="#showAbstract" data-abstract="' + data + '">Lihat Abstract</button>';
                 //      }
                 //  },
                 {
                     data: "publish_type",
                     class: 'responsive'
                 },
                 {
                     data: "publish_year",
                     class: 'responsive'
                 },
                 {
                     data: "issn",
                     class: 'responsive'
                 },
                 {
                     data: "eissn",
                     class: 'responsive'
                 },
                 {
                     data: "doi",
                     class: 'responsive'
                 },
                 {
                     data: "url",
                     render: function(data, type, row) {
                         return "<a href='" + data + "' target='_blank'>" + data + "</a>";
                     },
                     class: 'responsive'
                 },
             ]
         });


         $('#myTable tbody').on('click', "button.btn-show", function() {
             // Ambil isi abstract dari tombol yang diklik
             var abstractContent = $(this).data('abstract');
             console.log(abstractContent);
             // Tetapkan isi abstract ke dalam modal
             $('#abstractContent').text(abstractContent);

             // Tampilkan modal
             $('#showAbstract').removeClass('hidden');
         });

         $('#closeModal').on('click', function() {
             $('#showAbstract').addClass('hidden');
         });

     });
 </script>