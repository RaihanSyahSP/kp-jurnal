 <!-- Page content here -->
 <div class="px-5 mt-5 overflow-x" style="max-width: 100vw; overflow-x: auto;">
     <table id="myTable" class="display overflow-scroll w-full">
         <thead>
             <tr class="text-xs">
                 <th>No</th>
                 <th>Nama Dosen</th>
                 <th>Judul</th>
                 <th>Penulis 1</th>
                 <th>Penulis 2</th>
                 <th>Penulis 3</th>
                 <th>Nama Jurnal</th>
                 <th>Tahun Terbit</th>
                 <th>ISSN</th>
                 <th>DOI</th>
                 <th>Jumlah Sitasi</th>
                 <th>Link</th>
                 <th>Kolaborasi Mhs</th>
                 <th>Kolaborasi Non UNIKOM</th>
                 <th>H index</th>
                 <th>i10 index</th>
                 <th>Aksi</th>
             </tr>
         </thead>

         <tbody>


         </tbody>
     </table>
 </div>

 <!-- Modal for Editing Citation and DOI -->
 <div id="editModal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 z-50  justify-center items-center">
     <div class="modal-container bg-white w-96 p-4 rounded-lg shadow-lg">
         <div class="flex justify-end">
             <button id="closeModal" class="text-gray-600 hover:text-gray-800">&times;</button>
         </div>
         <h1 class="text-lg font-bold mb-4">Edit Data</h1>
         <form id="editForm">
             <label for="issn">ISSN:</label>
             <input type="text" id="issn" name="issn" class="w-full mb-2 p-2 border rounded">

             <label for="doi">DOI:</label>
             <input type="text" id="doi" name="doi" class="w-full mb-2 p-2 border rounded">

             <label for="kolaborasi_mhs">Kolaborasi Mahasiswa:</label>
             <input type="text" id="kolaborasi_mhs" name="kolaborasi_mhs" class="w-full mb-2 p-2 border rounded">

             <label for="koaborasi_non_unikom">Kolaborasi Non Unikom:</label>
             <input type="text" id="koaborasi_non_unikom" name="koaborasi_non_unikom" class="w-full mb-2 p-2 border rounded">

             <button type="submit" class="bg-blue-500 text-white p-2 mt-6 rounded w-full">Edit</button>
         </form>
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
             "dom": 'Blfrtip',
             "buttons": [{
                 "extend": 'excel',
                 "text": '<button class="btn btn-outline absolute left-40">Download Excel</button>',
                 "titleAttr": 'Excel',
                 "action": newexportaction
             }, ],
             "processing": true,
             "serverSide": true,
             "pageLength": 10,
             "lengthMenu": [10, 25, 50, 75, 100],
             "ajax": {
                 "url": "/gscholar/getDataTableGScholar",
                 "type": "post",
                 "datatype": "json"
             },
             columns: [{
                     data: "id",
                 },
                 {
                     data: "authors"
                 },
                 {
                     data: "title",
                 },
                 {
                     data: "authors",
                     render: function(data, type, row) {
                         var authors = data.split(', ');
                         var firstAuthors = authors[0] ? authors[0] : '';
                         return firstAuthors;
                     }
                 },
                 {
                     data: "authors",
                     render: function(data, type, row) {
                         var authors = data.split(', ');
                         var secondAuthors = authors[1] ? authors[1] : '';
                         return secondAuthors;
                     }
                 },
                 {
                     data: "authors",
                     render: function(data, type, row) {
                         var authors = data.split(', ');
                         var thirdAuthors = authors[2] ? authors[2] : '';
                         return thirdAuthors;
                     }
                 },
                 {
                     data: "journal_name",
                 },
                 {
                     data: "publish_year",
                 },
                 {
                     data: "issn",
                 },
                 {
                     data: "doi",
                 },
                 {
                     data: "citation",
                 },
                 {
                     data: "url",
                     render: function(data, type, row) {
                         return "<a href='" + data + "' target='_blank'>" + data + "</a>";
                     }
                 },
                 {
                     data: "kolaborasi_mhs",
                 },
                 {
                     data: "koaborasi_non_unikom"
                 },
                 {
                     data: "h_index"
                 },
                 {
                     data: "i10_index"
                 },
                 {
                     "targets": -1,
                     "data": null,
                     "render": function(data, type, row) {
                         return '<button class="btn edit-btn btn-success text-white">Edit</button>';
                     }
                 }
             ]
         });

         // Add an event listener for the "Edit" button
         $('#myTable tbody').on('click', 'button.edit-btn', function() {
             console.log('test');
             var data = table.row($(this).parents('tr')).data();
             console.log(data);
             openEditModal(data.id, data.issn, data.doi, data.kolaborasi_mhs, data.koaborasi_non_unikom);
         });

         // Function to open the edit modal
         function openEditModal(id, issn, doi, kolaborasi_mhs, koaborasi_non_unikom) {
             // Set values in the modal form
             $('#issn').val(issn);
             $('#doi').val(doi);
             $('#kolaborasi_mhs').val(kolaborasi_mhs);
             $('#koaborasi_non_unikom').val(koaborasi_non_unikom);

             // Show the modal
             $('#editModal').removeClass('hidden');
             $('#editModal').addClass('flex');

             // Add a submit event listener to the form
             $('#editForm').submit(function(event) {
                 event.preventDefault();

                 // Retrieve edited values
                 var editedIssn = $('#issn').val();
                 var editedDOI = $('#doi').val();
                 var editedKolaborasiMhs = $('#kolaborasi_mhs').val();
                 var editedKolaborasiNonUnikom = $('#koaborasi_non_unikom').val();

                 //  Perform AJAX request to update the data in the server
                 $.ajax({
                     url: '/gscholar/getEditGscholarInfo', // Replace with your server endpoint
                     method: 'POST',
                     data: {
                         id: id,
                         issn: editedIssn,
                         doi: editedDOI,
                         kolaborasi_mhs: editedKolaborasiMhs,
                         koaborasi_non_unikom: editedKolaborasiNonUnikom
                     },
                     success: function(response) {

                         Swal.fire({
                             icon: "success",
                             title: "Berhasil...",
                             text: "Berhasil Mengedit Data",
                         });

                         $('#editModal').addClass('hidden');
                         table.ajax.reload();
                     },
                     error: function(error) {
                         // Handle error
                         Swal.fire({
                             icon: "error",
                             title: "Gagal...",
                             text: "Gagal Mengedit Data",
                         });
                         console.error('Error updating data:', error);
                     }
                 });
             });
         }

         // Close the modal when the close button is clicked
         $('#closeModal').click(function() {
             $('#editModal').addClass('hidden');
             // Remove the submit event listener to prevent duplicate submissions
             $('#editForm').off('submit');
         });

     });
 </script>

 <!-- script tambahan  -->
 <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js">
 </script>