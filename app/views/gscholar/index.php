 <!-- Page content here -->
 <div class="px-5 mt-5 overflow-x">
     <table id="myTable" class="display  overflow-scroll w-full">
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
                 <th>Doi</th>
                 <th>Jumlah Sitasi</th>
                 <th>Link</th>
                 <th>Kolaborasi Mhs</th>
                 <th>Kolaborasi Non UNIKOM</th>
                 <th>Dosen Penulis 1</th>
                 <th>H-Index</th>
                 <th>i10 Index</th>
                 <th>Aksi</th>
             </tr>
         </thead>
         <tbody>
             <?php foreach ($data['gscholar'] as $gscholar) :
                    // Memecah string penulis menjadi array berdasarkan koma
                    $authors = explode(',', $gscholar['authors']);

                    // Mengambil tiga penulis pertama (Penulis 1, Penulis 2, Penulis 3)
                    $penulis1 = isset($authors[0]) ? trim($authors[0]) : '';
                    $penulis2 = isset($authors[1]) ? trim($authors[1]) : '';
                    $penulis3 = isset($authors[2]) ? trim($authors[2]) : '';

                    $cleanUrl = str_replace('"', '', $gscholar['url']);
                ?>
                 <tr class="text-xs">
                     <td><?= $gscholar['id']; ?></td>
                     <td><?= $gscholar['authors']; ?></td>
                     <td><?= $gscholar['title']; ?></td>
                     <td><?= $penulis1; ?></td>
                     <td><?= $penulis2; ?></td>
                     <td><?= $penulis3; ?></td>
                     <td><?= $gscholar['journal_name']; ?></td>
                     <td><?= $gscholar['publish_year']; ?></td>
                     <td><?= $gscholar['issn']; ?></td>
                     <td><?= $gscholar['doi']; ?></td>
                     <td><?= $gscholar['citation']; ?></td>
                     <td>
                         <a href="<?= $cleanUrl; ?>" target="_blank"><?= $gscholar['url']; ?></a>
                     </td>
                     <td><?= $gscholar['kolaborasi_mhs']; ?></td>
                     <td><?= $gscholar['koaborasi_non_unikom']; ?></td>
                     <td><?= $penulis1; ?></td>
                     <td><?= $gscholar['h_index']; ?></td>
                     <td><?= $gscholar['i10_index']; ?></td>
                     <td>
                         <!-- Open the modal using ID.showModal() method -->
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
                     </td>
                 </tr>
             <?php endforeach; ?>
         </tbody>
     </table>
 </div>


 <script>
     $(document).ready(function() {
         $('#myTable').DataTable({
             dom: 'Bfrtip',
             buttons: [
                 'copy', 'csv', 'excel', 'pdf', 'print'
             ]
         });
     })


     //  $(document).ready(function() {
     //      $('#myTable').DataTable({
     //          "processing": true,
     //          "serverSide": true,
     //          "pageLength": 10,
     //          "lengthMenu": [10, 25, 50, 75, 100],
     //          "ajax": {
     //              "url": "/home/getDataTable",
     //              "type": "post",
     //              "datatype": "json"
     //          },
     //          columns: [{
     //                  data: "id",
     //              },
     //              {
     //                  data: "id_sinta_author",
     //              },
     //              {
     //                  data: "id_document_gscholar",
     //              },
     //              {
     //                  data: "title",
     //              },
     //              {
     //                  data: "abstract",
     //              },
     //              {
     //                  data: "authors",
     //              },
     //              {
     //                  data: "journal_name",
     //              },
     //              {
     //                  data: "publish_year",
     //              },
     //              {
     //                  data: "citation"
     //              },
     //              {
     //                  data: "url"
     //              }
     //          ]
     //      });
     //  });
 </script>

 <!-- script tambahan  -->
 <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js">
 </script>