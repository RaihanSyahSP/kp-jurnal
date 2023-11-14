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



 <script>
     var modal = `
        <button class="btn" onclick="my_modal_5.showModal()">Edit</button>
                         <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
                             <div class="modal-box">
                                 <h3 class="font-bold text-lg">Hello!</h3>
                                 <p class="py-4">Press ESC key or click the button below to close</p>
                                 <div class="modal-action">
                                     <form method="dialog">
                                         <!-- if there is a button in form, it will close the modal -->
                                         <button class="btn">Close</button>
                                     </form>
                                 </div>
                             </div>
                        </dialog>
     `


     $(document).ready(function() {
         $('#myTable').DataTable({
             //  dom: 'Bfrtip',
             //  buttons: [
             //      'copy', 'csv', 'excel', 'pdf', 'print'
             //  ],
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
                     "defaultContent": modal
                 }
             ]
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