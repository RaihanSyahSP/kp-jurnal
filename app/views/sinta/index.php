 <!-- Page content here -->
<?php
 ini_set('display_errors', 1);
 error_reporting(E_ALL);
?>
 <div class="px-5 mt-5 overflow-x" style="max-width: 100vw; overflow-x: auto;">
     <table id="myTable" class="display" style="width: 100%;">
         <thead>
             <tr class="text-sm md:text-xs">
                 <th>No</th>
                 <th>Nama Lengkap</th>
                 <th>ID Sinta</th>
                 <th>Judul</th>
                 <th>Nama Jurnal</th>
                 <th>Penulis</th>
                 <th>Tahun Terbit</th>
                 <th>Index Scopus</th>
                 <th>Index Wos</th>
                 <th>Score Sinta 3year</th>
                 <th>Score Sinta Overall</th>
                 <th>Url</th>
                 <th>ISSN</th>
                 <th>DOI</th>
                 <th>Jumlah Sitasi</th>
                 <th>Kolaborasi Mhs</th>
                 <th>Kolaborasi Non Unikom</th>
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

 <script src="<?= BASEURL; ?>/js/exportExcel.js"></script>

 <script>
     $(document).ready(function() {
         // Declare table variable outside the DataTable initialization
         var table;

         table = $('#myTable').DataTable({
             "dom": 'lfBrtip',
             "responsive": true,
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
                 "url": "/sinta/getDataTableSinta",
                 "type": "post",
                 "datatype": "json"
             },
             columns: [{
                     data: "id",
                     class: 'responsive'
                 },
                 {
                     data: "fullname",
                     class: 'responsive'
                 },
                 {
                     data: "id_sinta_author",
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
                     class: 'responsive'
                 },
                 {
                     data: "publish_year",
                     class: 'responsive'
                 },
                 {
                     data: "index_scopus",
                     class: 'responsive'
                 },
                 {
                     data: "index_wos",
                     class: 'responsive'
                 },
                 {
                     data: "score_sinta_v3_3year",
                     class: 'responsive'
                 },
                 {
                     data: "score_sinta_v3_overall",
                     class: 'responsive'
                 },
                 {
                     data: "url",
                     render: function(data, type, row) {
                         return "<a href='" + data + "' target='_blank'>" + data + "</a>";
                     },
                     class: 'responsive'
                 },
                 {
                     data: "doi",
                     class: 'responsive'
                 },
                 {
                     data: "citation",
                     class: 'responsive'
                 },
                 {
                     data: "issn",
                     class: 'responsive'
                 },
                 {
                     data: "kolaborasi_mhs",
                     class: 'responsive'
                 },
                 {
                     data: "koaborasi_non_unikom",
                     class: 'responsive'
                 },
             ]
         });

     });
 </script>