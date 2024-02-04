 <!-- Page content here -->
 <div class="px-5 mt-5 overflow-x" style="max-width: 100vw; overflow-x: auto;">
     <table id="myTable" class="display" style="width: 100%;">
         <thead>
             <tr class="text-sm md:text-xs">
                 <th>No</th>
                 <th>Judul</th>
                 <th>Nama Publikasi</th>
                 <th>Penulis</th>
                 <th>Quartil</th>
                 <th>Volume</th>
                 <th>Tanggal Terbit</th>
                 <th>DOI</th>
                 <th>Jumlah Sitasi</th>
                 <th>Tipe</th>
                 <th>Url</th>
                 <th>ISSN</th>
                 <th>H Index</th>
                 <th>i10 Index</th>
                 <th>G Index</th>
                 <th>G Index 3Thn</th>
             </tr>
         </thead>

         <tbody>


         </tbody>
     </table>
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
                 "url": "/scopus/getDataTableScopus",
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
                     data: "publication_name",
                     class: 'responsive'
                 },
                 {
                     data: "creator",
                     class: 'responsive'
                 },
                 {
                     data: "quartile",
                     class: 'responsive'
                 },
                 {
                     data: "volume",
                     class: 'responsive'
                 },
                 {
                     data: "cover_date",
                     class: 'responsive'
                 },
                 {
                     data: "doi",
                     class: 'responsive'
                 },

                 {
                     data: "citedby_count",
                     class: 'responsive'
                 },
                 {
                     data: "aggregation_type",
                     class: 'responsive'
                 },
                 {
                     data: "url",
                     class: 'responsive'
                 },
                 {
                     data: "issn",
                     class: 'responsive'
                 },
                 {
                     data: "h_index",
                     class: 'responsive'
                 },
                 {
                     data: "i10_index",
                     class: 'responsive'
                 },
                 {
                     data: "g_index",
                     class: 'responsive'
                 },
                 {
                     data: "g_index_3year",
                     class: 'responsive'
                 },
             ]
         });

     });
 </script>